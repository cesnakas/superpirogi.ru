<?php

namespace Yandex\Market\Components;

use Bitrix\Main;
use Yandex\Market;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class AdminFormEdit extends \CBitrixComponent
{
    protected static $langPrefix = 'YANDER_MARKET_FORM_EDIT_';

    /** @var \Yandex\Market\Component\Base\EditForm */
    protected $provider;

    public function onPrepareComponentParams($params)
    {
        $params['FORM_ID'] = trim($params['FORM_ID']);
        $params['TITLE'] = trim($params['TITLE']);
        $params['TITLE_ADD'] = trim($params['TITLE_ADD']);
        $params['BTN_SAVE'] = trim($params['BTN_SAVE']);
        $params['BTN_APPLY'] = trim($params['BTN_APPLY']);
        $params['LIST_URL'] = trim($params['LIST_URL']);
        $params['SAVE_URL'] = trim($params['SAVE_URL']);
        $params['CONTEXT_MENU'] = (array)$params['CONTEXT_MENU'];
        $params['TABS'] = (array)$params['TABS'];
        $params['FORM_BEHAVIOR'] = ($params['FORM_BEHAVIOR'] === 'steps' ? 'steps' : 'tabs');
        $params['COPY'] = (bool)$params['COPY'];
	    $params['ALLOW_SAVE'] = isset($params['ALLOW_SAVE']) ? (bool)$params['ALLOW_SAVE'] : true;
	    $params['SAVE_PARTIALLY'] = isset($params['SAVE_PARTIALLY']) ? (bool)$params['SAVE_PARTIALLY'] : false;

        if (empty($params['TABS']))
        {
            $params['TABS'] = [
            	[ 'name' => $this->getLang('DEFAULT_TAB_NAME') ]
            ];
        }

        $params['PROVIDER_TYPE'] = trim($params['PROVIDER_TYPE']);

        $provider = $this->getProvider($params['PROVIDER_TYPE']);

        $params = $provider->prepareComponentParams($params);

        return $params;
    }

    public function executeComponent()
    {
        $this->initResult();

        if (!$this->checkParams() || !$this->loadModules())
        {
            $this->showErrors();
            return;
        }

        $templatePage = '';
        $isStepsBehavior = ($this->arParams['FORM_BEHAVIOR'] === 'steps');

        try
        {
            if ($this->hasCancelRequest())
            {
                $this->redirectCancel();
            }

	        $this->loadItem();
	        $this->buildContextMenu();
	        $this->buildTabs();
	        $this->buildButtons();

	        $requestStep = $this->getRequestStep();
	        $hasRequest = $this->hasRequest();
	        $hasSaveRequest = $this->hasSaveRequest();
	        $isFoundRequestStep = false;
	        $isFirstTab = true;

            foreach ($this->arResult['TABS'] as &$tab)
            {
            	$tabFields = !empty($tab['SELECT']) || $isFirstTab ? $this->loadFields($tab['SELECT']) : [];
            	$stepValidateResult = true;

            	$this->registerTabFields($tab, $tabFields);

            	if ($hasRequest)
	            {
	                $this->fillRequest($tabFields);
	                $this->resolveDependency($tabFields);

	                if (
	                    $isStepsBehavior
	                    && (
	                        $hasSaveRequest // validate all on save
	                        || (!$isFoundRequestStep && $requestStep !== $tab['STEP']) // validate previous steps on move
                        )
                    )
	                {
		                $stepValidateResult = $this->validateRequest($tabFields);
			        }
		        }
            	else
	            {
	            	$this->resolveDependency($tabFields);
	            }

            	$this->registerFields($tabFields);

		        if ($isStepsBehavior && !$isFoundRequestStep)
	            {
	            	$this->arResult['STEP'] = $tab['STEP'];
	            	$this->arResult['STEP_FINAL'] = $tab['FINAL'];

	                if (!$stepValidateResult || $requestStep === $tab['STEP'])
	                {
	                    $isFoundRequestStep = true;
	                }
		        }

	            $isFirstTab = false;
            }
            unset($tab);

            if (!$isStepsBehavior && $hasSaveRequest)
            {
                $this->validateRequest();
            }

			if ($this->hasAjaxAction())
			{
				$this->processAjaxAction();
			}
			else if ($this->hasPostAction())
			{
				if (!check_bitrix_sessid())
				{
					$this->addError($this->getLang('EXPIRE_SESSION'));
				}

				if (!$this->hasErrors())
				{
					$this->processPostAction();
				}

				if (!$this->hasErrors())
				{
					$this->redirectAfterSave();
				}
			}
			else if ($hasSaveRequest)
            {
	            if (!$this->arParams['ALLOW_SAVE'])
	            {
		            $this->addError($this->getLang('SAVE_DISALLOW'));
	            }
            	else if (!check_bitrix_sessid())
	            {
	                $this->addError($this->getLang('EXPIRE_SESSION'));
	            }

            	$hasValidationErrors = $this->hasErrors();
	            $savePrimary = null;

	            if (!$hasValidationErrors)
	            {
	                $savePrimary = $this->saveFull();
	            }
	            else if ($this->arParams['SAVE_PARTIALLY'])
	            {
	            	$savePrimary = $this->savePartially();
                }

	            $hasSaveErrors = $this->hasErrors();

	            if (!$hasSaveErrors && $savePrimary !== null)
	            {
		            $this->redirectAfterSave($savePrimary);
	            }
            }

            $this->extendItem();
        }
        catch (Main\SystemException $exception)
        {
	        $templatePage = 'exception';
            $this->addError($exception->getMessage());

			$this->arResult['EXCEPTION_MIGRATION'] = Market\Migration\Controller::canRestore($exception);
        }

        $this->setTitle();

	    $this->includeComponentTemplate($templatePage);
    }

    protected function initResult()
    {
        $this->arResult['STEP'] = null;
        $this->arResult['STEP_FINAL'] = false;
        $this->arResult['FIELDS'] = [];
        $this->arResult['ITEM'] = [];
        $this->arResult['ITEM_ORIGINAL'] = [];
        $this->arResult['ERRORS'] = [];
        $this->arResult['FIELD_ERRORS'] = [];
        $this->arResult['TABS'] = [];
        $this->arResult['BUTTONS'] = [];
        $this->arResult['HAS_REQUEST'] = false;
    }

    protected function getRequiredParams()
    {
        $provider = $this->getProvider();
        $result = [ 'FORM_ID' ] + $provider->getRequiredParams();

        return $result;
    }

    protected function checkParams()
    {
        $result = true;
        $requiredParams = $this->getRequiredParams();

        foreach ($requiredParams as $paramKey)
        {
            if (empty($this->arParams[ $paramKey ]))
            {
                $result = false;

                $this->addError($this->getLang('PARAM_REQUIRE', [
                    '#PARAM#' => $paramKey
                ]));
            }
        }

        return $result;
    }

    protected function getRequiredModules()
    {
        $provider = $this->getProvider();

        return $provider->getRequiredModules();
    }

    protected function loadModules()
    {
        $result = true;
        $modules = $this->getRequiredModules();

        foreach ($modules as $module)
        {
            if (!$this->loadModule($module))
            {
                $result = false;
            }
        }

        return $result;
    }

    protected function loadModule($module)
    {
        $result = true;

        if (!Main\Loader::includeModule($module))
        {
            $result = false;

            $this->addError($this->getLang('MODULE_REQUIRE', [
                '#MODULE#' => $module
            ]));
        }

        return $result;
    }

    protected function addFieldError($fieldName, $message)
    {
        $this->arResult['FIELD_ERRORS'][$fieldName] = true;

        $this->addError($message);
    }

    protected function addError($message)
    {
        $this->arResult['ERRORS'][] = $message;
    }

    public function hasErrors()
    {
        return !empty($this->arResult['ERRORS']);
    }

    public function showErrors()
    {
        \CAdminMessage::ShowMessage([
            'TYPE' => 'ERROR',
            'MESSAGE' => implode('<br />', $this->arResult['ERRORS']),
            'HTML' => true
        ]);
    }

    protected function setTitle()
    {
        global $APPLICATION;

        $title = $this->arParams['TITLE'];
        $primary = $this->getPrimary();

        if ($primary === null && $this->arParams['TITLE_ADD'] !== '')
        {
            $title = $this->arParams['TITLE_ADD'];
        }

        if ($title !== '')
        {
            $APPLICATION->SetTitle($title);
        }
    }

    protected function getFieldsSelect()
    {
        $result = [];

        foreach ($this->arParams['TABS'] as $tab)
        {
            if (!empty($tab['fields']))
            {
                foreach ($tab['fields'] as $field)
                {
                    $result[] = $field;
                }
            }
        }

        return $result;
    }

    protected function hasAjaxAction()
    {
        return ($this->getAjaxAction() !== null);
    }

    protected function getAjaxAction()
    {
        return $this->request->getPost('ajaxAction');
    }

    protected function processAjaxAction()
    {
        global $APPLICATION;

        $ajaxAction = $this->getAjaxAction();
        $provider = $this->getProvider();

        try
        {
	        $data = $this->arResult['ITEM'];
	        $data['PRIMARY'] = $this->getPrimary();

            $response = $provider->processAjaxAction($ajaxAction, $data);
        }
        catch (Main\SystemException $exception)
        {
            $response = [
                'status' => 'error',
                'message' => $exception->getMessage()
            ];
        }

        $APPLICATION->RestartBuffer();
        echo Market\Utils::jsonEncode($response, JSON_UNESCAPED_UNICODE);
        die();
    }

	protected function hasPostAction()
	{
		return ($this->getPostAction() !== null);
	}

	protected function getPostAction()
	{
		return $this->request->getPost('postAction');
	}

	protected function processPostAction()
	{
		$postAction = $this->getPostAction();
		$provider = $this->getProvider();

		try
		{
			$data = $this->arResult['ITEM'];
			$data['PRIMARY'] = $this->getPrimary();

			$provider->processPostAction($postAction, $data);
		}
		catch (Main\SystemException $exception)
		{
			$this->addError($exception->getMessage());
		}
	}

    protected function hasRequest()
    {
        $result = $this->hasStepRequest() || $this->hasSaveRequest() || $this->hasPostAction() || $this->hasAjaxAction();

        $this->arResult['HAS_REQUEST'] = $result;

        return $result;
    }

    protected function hasCancelRequest()
    {
        return ($this->request->getPost('cancel') !== null);
    }

    protected function hasStepRequest()
    {
        return ($this->request->getPost('stepAction') !== null);
    }

    protected function hasSaveRequest()
    {
        return ($this->request->getPost('apply') !== null || $this->request->getPost('save') !== null);
    }

    protected function getRequestStep()
    {
        $stepCount = \count($this->arResult['TABS']);
        $stepIndex = (int)$this->request->getPost('STEP');

        // step action

        $stepAction = $this->request->getPost('stepAction');

        switch (true)
        {
	        case ($stepAction === 'previous'):
	            $stepIndex -= 1;
	        break;

	        case ($stepAction === 'next'):
	            $stepIndex += 1;
	        break;

	        case (is_numeric($stepAction)):
                $stepIndex = (int)$stepAction;
	        break;
        }

        // normalize index

        if ($stepIndex <= 0)
        {
            $stepIndex = 0;
        }
        else if ($stepIndex >= $stepCount)
        {
            $stepIndex = $stepCount - 1;
        }

        return $stepIndex;
    }

    protected function fillRequest($fields)
    {
		$provider = $this->getProvider();

        foreach ($fields as $field)
        {
            if ($field['USER_TYPE']['BASE_TYPE'] === 'file')
            {
	            $this->getFileByRequestKey($_POST, $_FILES, $field['FIELD_NAME'], $this->arResult['ITEM']);
            }
            else
            {
	            $this->getValueByRequestKey($_POST, $field['FIELD_NAME'], $this->arResult['ITEM']);
            }
        }

        $this->arResult['ITEM'] = $provider->modifyRequest($this->arResult['ITEM'], $fields);
    }

    protected function getValueByRequestKey($values, $key, &$result)
    {
        $keyChain = $this->splitFieldNameToChain($key);

        if (!empty($keyChain))
        {
            $valuesLevel = $values;
            $resultLevel = &$result;
            $keyChainLength = count($keyChain);

            for ($i = 0; $i < $keyChainLength; $i++)
            {
				$key = $keyChain[$i];
                $isLastKey = ($i === $keyChainLength - 1);

                if ($isLastKey)
                {
                    $resultLevel[$key] = isset($valuesLevel[$key]) ? $valuesLevel[$key] : null;
                }
                else
                {
                    if (!isset($resultLevel[$key]))
                    {
                        $resultLevel[$key] = [];
                    }

                    $resultLevel = &$resultLevel[$key];
                    $valuesLevel = isset($valuesLevel[$key]) ? $valuesLevel[$key] : null;
                }
            }
        }
    }

    protected function getFileByRequestKey($post, $files, $key, &$result)
    {
	    $keyChain = $this->splitFieldNameToChain($key);

	    if (count($keyChain) > 1)
	    {
	    	throw new Main\NotImplementedException();
	    }
	    else
	    {
	    	$requestKey = reset($keyChain);
	    	$deleteRequestKey = $requestKey . '_del';
	    	$oldIdRequestKey = $requestKey . '_old_id';

	    	$request = isset($files[$requestKey]) && is_array($files[$requestKey]) ? $files[$requestKey] : [];

	    	if (isset($post[$deleteRequestKey]))
		    {
			    $request['del'] = ($post[$deleteRequestKey] === 'Y');
		    }

	    	if (isset($post[$oldIdRequestKey]))
		    {
			    $request['old_id'] = (int)$post[$oldIdRequestKey];
		    }

	    	$result[$requestKey] = $request;
	    }
    }

	protected function resolveDependency(&$fields)
	{
		$statuses = $this->getDependencyStatuses($fields);

		foreach ($statuses as $fieldName => $status)
		{
			if (!isset($fields[$fieldName])) { continue; }

			$fields[$fieldName]['DEPEND_HIDDEN'] = $status;
		}
	}

	protected function getDependencyStatuses($fields)
	{
		$result = [];

		foreach ($fields as $fieldName => $field)
		{
			if (!isset($field['DEPEND'])) { continue; }

			$isHidden = false;

			foreach ($field['DEPEND'] as $dependField => $dependConfig)
			{
				$dependValue = isset($this->arResult['ITEM'][$dependField]) ? $this->arResult['ITEM'][$dependField] : null;

				switch ($dependConfig['RULE'])
				{
					case 'EMPTY':
						$isDependValueEmpty = Market\Utils\Value::isEmpty($dependValue) || (string)$dependValue === '0';
						$isMatch = ($isDependValueEmpty === $dependConfig['VALUE']);
					break;

					case 'ANY':
						$isMatch = in_array($dependConfig['VALUE'], (array)$dependValue);
					break;

					default:
						$isMatch = true;
					break;
				}

				if (!$isMatch)
				{
					$isHidden = true;
					break;
				}
			}

			$result[$fieldName] = $isHidden;
		}

		return $result;
	}

    protected function validateRequest($fields = null)
    {
    	if ($fields === null)
	    {
	    	$fields = $this->arResult['FIELDS'];
	    }

    	$data = $this->arResult['ITEM'];
    	$data['PRIMARY'] = $this->getPrimary();

        $provider = $this->getProvider();
        $validationResult = $provider->validate($data, $fields);
        $result = false;

        if ($validationResult->isSuccess())
        {
            $result = true;
        }
        else
        {
            $errors = $validationResult->getErrors();

            if (!empty($errors))
            {
                foreach ($errors as $error)
                {
                    $errorCustomData = method_exists($error, 'getCustomData') ? $error->getCustomData() : null;

                    if (isset($errorCustomData['FIELD']))
                    {
                    	$this->addFieldError($errorCustomData['FIELD'], $error->getMessage());
                    }
                    else
                    {
                        $this->addError($error->getMessage());
                    }
                }
            }
            else
            {
                $this->addError($this->getLang('VALIDATE_ERROR_UNDEFINED'));
            }
        }

        return $result;
    }

    protected function saveFull()
    {
	    $fields = $this->arResult['ITEM'];

    	return $this->save($fields);
    }

    protected function savePartially()
    {
	    $fields = $this->arResult['ITEM'];
	    $fieldsOriginal = $this->arResult['ITEM_ORIGINAL'];

	    foreach ($this->getFieldsWithError() as $fieldName)
	    {
			if (!array_key_exists($fieldName, $fields))
			{
				// nothing
			}
			else if (array_key_exists($fieldName, $fieldsOriginal))
			{
				$fields[$fieldName] = $fieldsOriginal[$fieldName];
			}
			else
			{
				unset($fields[$fieldName]);
			}
	    }

	    if (!empty($fields))
	    {
	    	$result = $this->save($fields);
	    }
	    else
	    {
	    	$result = null;
	    }

    	return $result;
    }

    protected function save($fields)
    {
        $provider = $this->getProvider();
        $primary = $this->getPrimary();
        $saveResult = null;
        $result = null;

        if ($primary !== null)
        {
            $saveResult = $provider->update($primary, $fields);
        }
        else
        {
            $saveResult = $provider->add($fields);

            if ($saveResult->isSuccess())
            {
                $primary = $saveResult->getId();
            }
        }

        if ($saveResult->isSuccess())
        {
			$result = $primary;
        }
        else
        {
            $errors = $saveResult->getErrors();

            if (!empty($errors))
            {
                foreach ($errors as $error)
                {
                    $this->addError($error->getMessage());
                }
            }
            else
            {
                $this->addError($this->getLang('SAVE_ERROR_UNDEFINED'));
            }
        }

        return $result;
    }

    protected function getPrimary($useOrigin = false)
    {
	    $result = null;

	    if (
	    	!empty($this->arParams['PRIMARY'])
	        && (!$this->arParams['COPY'] || $useOrigin)
	    )
	    {
		    $result = $this->arParams['PRIMARY'];
	    }

    	return $result;
    }

    protected function redirectCancel()
    {
        LocalRedirect($this->arParams['LIST_URL']);
        die();
    }

    protected function redirectAfterSave($primary = null)
    {
        global $APPLICATION;

        $redirectUrl = '';
	    $parameters = [];

	    if ($primary !== null)
	    {
		    $parameters['id'] = $primary;
	    }

	    if ($this->arParams['FORM_BEHAVIOR'] !== 'steps')
	    {
		    $activeTabRequestKey = $this->arParams['FORM_ID'] . '_active_tab';
		    $activeTab = $this->request->getPost($activeTabRequestKey);

		    $parameters[$activeTabRequestKey] = $activeTab;
	    }

	    if ($this->request->getPost('save'))
	    {
		    $redirectUrl = (string)($this->arParams['SAVE_URL'] ?: $this->arParams['LIST_URL']);
	    }

        if ($redirectUrl !== '')
        {
        	$leftParameters = [];

        	foreach ($parameters as $name => $value)
	        {
	        	$searchHolder = '#' . strtoupper($name) . '#';
	        	$searchPosition = strpos($redirectUrl, $searchHolder);

	        	if ($searchPosition !== false)
		        {
		        	$redirectUrl = str_replace($searchHolder, $value, $redirectUrl);
		        }
	        	else
		        {
		        	$leftParameters[$name] = $value;
		        }
	        }

        	if (!empty($leftParameters))
	        {
	        	$redirectUrl .=
			        (strpos($redirectUrl, '?') === false ? '?' : '&')
			        . http_build_query($leftParameters);
	        }
        }
        else
        {
	        $redirectUrl = $APPLICATION->GetCurPageParam(
	        	http_build_query($parameters),
		        array_keys($parameters)
	        );
        }

        LocalRedirect($redirectUrl);
        die();
    }

    protected function loadItem()
    {
        $primary = $this->getPrimary(true);

        if ($primary !== null)
        {
	        $provider = $this->getProvider();
            $fieldsSelect = $this->getFieldsSelect();

            $this->arResult['ITEM'] = $provider->load($primary, $fieldsSelect, $this->arParams['COPY']);
            $this->arResult['ITEM_ORIGINAL'] = $this->arResult['ITEM'];
        }
    }

    protected function loadFields($select)
    {
        $provider = $this->getProvider();

	    return $provider->getFields((array)$select, $this->arResult['ITEM']);
    }

    protected function registerFields($fields)
    {
    	$this->arResult['FIELDS'] += $fields;
    }

    protected function extendItem()
    {
        $provider = $this->getProvider();
        $isStepsBehavior = ($this->arParams['FORM_BEHAVIOR'] === 'steps');
        $selectFields = [];

        foreach ($this->arResult['TABS'] as $tab)
        {
            if (!$isStepsBehavior)
            {
                array_splice($selectFields, -1, 0, $tab['FIELDS']);
            }
            else if ($tab['STEP'] === $this->arResult['STEP'])
            {
                $selectFields = $tab['FIELDS'];
            }
        }

        $this->arResult['ITEM'] = $provider->extend($this->arResult['ITEM'], $selectFields);
    }

    protected function buildContextMenu()
    {
		$this->arResult['CONTEXT_MENU'] = $this->arParams['CONTEXT_MENU']; // simple copy, need for future modifications
    }

    protected function buildTabs()
    {
        $paramTabs = $this->arParams['TABS'];
        $countTabs = count($paramTabs);
        $hasFinalTab = false;
        $tabIndex = 0;
        $result = [];

        foreach ($paramTabs as $paramTab)
        {
            $isFinalTab = (!empty($paramTab['final']) || (!$hasFinalTab && $tabIndex === $countTabs - 1));

            if ($isFinalTab)
            {
                $hasFinalTab = true;
            }

            $result[] = [
                'STEP' => $tabIndex,
                'FINAL' => $isFinalTab,
                'DIV' => 'tab' . $tabIndex,
                'TAB' => $paramTab['name'],
                'LAYOUT' => $paramTab['layout'] ?: 'default',
                'SELECT' => $paramTab['fields'] ?: [],
                'FIELDS' => [],
                'HIDDEN' => [],
                'DATA' => isset($paramTab['data']) ? (array)$paramTab['data'] : []
            ];

            $tabIndex++;
        }

        $this->arResult['TABS'] = $result;
    }

    protected function buildButtons()
    {
    	if (!empty($this->arParams['BUTTONS']))
	    {
	        $this->arResult['BUTTONS'] = (array)$this->arParams['BUTTONS'];
	    }
		else if ($this->arParams['FORM_BEHAVIOR'] === 'steps')
		{
			$this->arResult['BUTTONS'] = [
				[ 'BEHAVIOR' => 'previous' ],
				[ 'BEHAVIOR' => 'next' ],
			];
		}
		else
		{
			$this->arResult['BUTTONS'] = [
				[ 'BEHAVIOR' => 'save' ],
				[ 'BEHAVIOR' => 'apply' ],
			];
		}
    }

    protected function registerTabFields(&$tab, $fields)
    {
        foreach ($fields as $fieldKey => $field)
        {
	        if (!empty($field['HIDDEN']) && $field['HIDDEN'] !== 'N')
	        {
	            $tab['HIDDEN'][] = $fieldKey;
	        }
	        else
	        {
	            $tab['FIELDS'][] = $fieldKey;
	        }
        }
    }

	public function getField($fieldKey)
	{
		$result = null;

        if (isset($this->arResult['FIELDS'][$fieldKey]))
        {
            $result = $this->arResult['FIELDS'][$fieldKey];
        }

        return $result;
	}

    public function hasFieldError($field)
    {
        return !empty($this->arResult['FIELD_ERRORS'][$field['FIELD_NAME']]);
    }

    public function getFieldsWithError()
    {
    	return array_keys($this->arResult['FIELD_ERRORS']);
    }

    public function getFieldTitle($field)
    {
        return $this->getFirstNotEmpty(
            $field,
            [ 'EDIT_FORM_LABEL', 'LIST_COLUMN_LABEL', 'LIST_FILTER_LABEL' ]
        );
    }

    public function getFieldValue($field)
    {
        // try fetch from item

        $keyChain = $this->splitFieldNameToChain($field['FIELD_NAME']);
        $result = $this->getValueByChain($this->arResult['ITEM'], $keyChain);

		// may be defined value

		if ($result !== null)
		{
			// nothing
		}
		else if (isset($field['VALUE']))
        {
            $result = $field['VALUE'];
        }
        else if (isset($field['SETTINGS']['DEFAULT_VALUE']))
        {
			$result = $field['SETTINGS']['DEFAULT_VALUE'];
        }

        return $result;
    }

    public function getOriginalValue($field)
    {
	    $keyChain = $this->splitFieldNameToChain($field['FIELD_NAME']);

	    return $this->getValueByChain($this->arResult['ITEM_ORIGINAL'], $keyChain);
    }

    public function getFieldHtml($field, $value = null, $isExtended = false)
    {
        global $USER_FIELD_MANAGER;

        $result = null;

        if (empty($field['HIDDEN']) || $field['HIDDEN'] === 'N')
        {
            $field['ENTITY_VALUE_ID'] = $this->getPrimary();
            $field['VALUE'] = $value !== null ? $value : $this->getFieldValue($field);
	        $field['ROW'] = $this->arResult['ITEM'];

	        $html = $USER_FIELD_MANAGER->GetEditFormHTML(false, null, $field);

	        if ($isExtended)
	        {
	        	$result = $this->extractAdminInputExtended($html);
	        }
	        else
	        {
		        $result = $this->extractAdminInput($html);
	        }
        }

        return $result;
    }

    protected function getFirstNotEmpty($data, $keys)
    {
        $result = null;

        foreach ($keys as $key)
        {
            if (!empty($data[ $key ]))
            {
                $result = $data[ $key ];
            }
        }

        return $result;
    }

    protected function extractAdminInputExtended($html)
    {
	    $result = [
	    	'ROW_CLASS' => '',
		    'VALIGN' => '',
	    	'CONTROL' => $html,
	    ];

	    if (preg_match('/^<tr(.*?)>(?:<td(.*?)>.*?<\/td>)?<td.*?>(.*)<\/td><\/tr>$/s', $html, $match))
	    {
	    	$rowAttributes = trim($match[1]);
	    	$rowClassName = '';
	    	$titleAttributes = trim($match[2]);
	    	$titleVerticalAlign = null;

	    	if (preg_match('/class="(.*?)"/', $rowAttributes, $rowMatches))
		    {
			    $rowClassName = $rowMatches[1];
		    }

	    	if (preg_match('/valign="(.*?)"/', $titleAttributes, $titleMatches))
		    {
		    	$titleVerticalAlign = $titleMatches[1];
		    }
	    	else if (strpos($titleAttributes, 'adm-detail-valign-top') !== false)
		    {
		    	$titleVerticalAlign = 'top';
		    }

		    $result['ROW_CLASS'] = $rowClassName;
		    $result['VALIGN'] = $titleVerticalAlign;
		    $result['CONTROL'] = $match[3];
	    }

	    return $result;
    }

    protected function extractAdminInput($html)
    {
        $result = $html;

        if (preg_match('/^<tr.*?>(?:<td.*?>.*?<\/td>)?<td.*?>(.*)<\/td><\/tr>$/s', $html, $match))
        {
            $result = $match[1];
        }

        return $result;
    }

    public function getLang($code, $replaces = null)
    {
		return Main\Localization\Loc::getMessage(static::$langPrefix . $code, $replaces) ?: $code;
    }

    public function getProvider($providerType = null)
    {
        if ($this->provider === null)
        {
            if (!Main\Loader::includeModule('yandex.market'))
            {
                throw new Main\SystemException($this->getLang('REQUIRE_SELF_MODULE'));
            }

            if (!isset($providerType))
            {
                $providerType = $this->arParams['PROVIDER_TYPE'];
            }

            $className = 'Yandex\Market\Component\\' . $providerType . '\EditForm';

            if (
                !class_exists($className)
                || !is_subclass_of($className, 'Yandex\Market\Component\Base\EditForm')
            )
            {
				throw new Main\SystemException($this->getLang('INVALID_PROVIDER'));
            }

            $this->provider = new $className($this);
        }

        return $this->provider;
    }

    protected function getValueByChain($item, $keyChain)
    {
	    $itemLevel = $item;
	    $keyChainLength = count($keyChain);
	    $result = null;

	    for ($i = 0; $i < $keyChainLength; $i++)
	    {
		    $key = $keyChain[$i];
		    $isLastKey = ($i === $keyChainLength - 1);

		    if ($isLastKey)
		    {
			    $result = isset($itemLevel[$key]) ? $itemLevel[$key] : null;
		    }
		    else
		    {
			    $itemLevel = isset($itemLevel[$key]) ? $itemLevel[$key] : null;
		    }
	    }

	    return $result;
    }

    protected function splitFieldNameToChain($key)
    {
        $keyOffset = 0;
        $keyLength = strlen($key);
        $keyChain = [];

        do
        {
            $keyPart = null;

            if ($keyOffset === 0)
            {
                $arrayEnd = strpos($key, '[');

                if ($arrayEnd === false)
                {
                    $keyPart = $key;
                    $keyOffset = $keyLength;
                }
                else
                {
                    $keyPart = substr($key, $keyOffset, $arrayEnd - $keyOffset);
                    $keyOffset = $arrayEnd + 1;
                }
            }
            else
            {
				$arrayEnd = strpos($key, ']', $keyOffset);

				if ($arrayEnd === false)
				{
					$keyPart = substr($key, $keyOffset);
                    $keyOffset = $keyLength;
				}
				else
				{
					$keyPart = substr($key, $keyOffset, $arrayEnd - $keyOffset);
                    $keyOffset = $arrayEnd + 2;
				}
			}

			if (strlen($keyPart) > 0)
			{
				$keyChain[] = $keyPart;
			}
			else
			{
				break;
			}
        }
        while ($keyOffset < $keyLength);

        return $keyChain;
    }
}