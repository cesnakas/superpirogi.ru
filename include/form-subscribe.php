<form id="call_formm" enctype="multipart/form-data" class="subscribe_form center d-flex" onsubmit="submit_button(this);return false;">
<div id="sk_call_form_container">
<p id="sk_call_error"></p>
	<span class="subscribe_form-heading">
		Узнавай первым!
	</span>
	<p class="subscribe_form-text">
		Получай на почту информацию о новых акциях!
	</p>
	<label class="input_wrap">
		<input type="email" name="Почта" placeholder="E-mail *" required="required">
			<input type="hidden" name="site" value="superpirogi.ru">
			<input type="hidden" name="href" value="<?=$_SERVER['REQUEST_URI']?>">
			<input type="hidden" name="type" value="Новая подписка на рассылку!">
			<input type="hidden" name="mail" value="info@superpirogi.ru">
			<input type="hidden" name="g-recaptcha-response" value="true">
		<button>
			<input type="submit" onclick="yaCounter64629202.reachGoal('uznavay-pervym'); return true;">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0.75 3.25V21.25H23.25V3.25H0.75ZM11.1 14.013C11.348 14.199 11.661 14.311 12 14.311C12.339 14.311 12.652 14.199 12.904 14.01L12.9 14.013L14 13.188L21.75 19.001V19.751H2.25V19.001L10 13.188L11.1 14.013ZM12 12.813L2.25 5.5V4.75H21.75V5.5L12 12.813ZM2.25 7.375L8.75 12.25L2.25 17.125V7.375ZM21.75 17.125L15.25 12.25L21.75 7.375V17.125Z" fill="#333333"/>
			</svg>
		</button>
	</label>
	</div>
</form>