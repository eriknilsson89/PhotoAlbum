<com:TPanel CssClass="login" DefaultButton="LoginButton">
  <h4>Login to Site</h4>
  <com:TLabel
		ForControl="Username"
		Text="User Name"
		CssClass="label"/>
  <com:TTextBox ID="Username"
		AccessKey="u"
		ValidationGroup="login"
		CssClass="textbox"/>
  <com:TRequiredFieldValidator
		ControlToValidate="Username"
		ValidationGroup="login"
		Display="Dynamic"
		ErrorMessage="*"/>

  <com:TLabel
		ForControl="Password"
		Text="Password"
		CssClass="label"/>
  <com:TTextBox ID="Password"
		AccessKey="p"
		CssClass="textbox"
		ValidationGroup="login"
		TextMode="Password"/>
  <com:TCustomValidator
		ControlToValidate="Password"
		ValidationGroup="login"
		Text="...invalid"
		Display="Dynamic"
		OnServerValidate="validateUser" />

  <div>
    <com:TCheckBox ID="RememberMe" Text="Remember me next time"/>
  </div>

  <com:TButton ID="LoginButton"
    Text="Log In"
		OnClick="loginButtonClicked"
		ValidationGroup="login"
		CssClass="button"/>
  <a href="?page=register">Not a member? Register here!</a>
</com:TPanel>