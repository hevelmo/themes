<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>{{siteName}} &middot; {{newAccountTitle}}</title>
</head>

<body style="background-color: #F7F8FA; width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;">
	<div style="color: #F7F8FA; font-size:0; line-height:0;">{{siteName}}</div>
	<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#F7F8FA">
		<tr>
			<td valign="top" align="center">
				<table id="wrapper" style="max-width: 850px; padding:10px 10px;" cellpadding="0" cellspacing="0" border="0" width="100%" >
					<tr><td valign="top" align="center"></td></tr>
					<tr><td valign="top" height="20"></td></tr>
					<tr>
						<td valign="top" align="center">
							<table cellpadding="0" cellspacing="0" width="100%" >
								<tr height="25" style="height:25px">
									<td></td>
									<td rowspan="2" valign="top" align="center" width="78" height="79" bgcolor="white">
										<a href="{{installUrl}}" target="_blank" style="display: block; width: 78px; height: 79px; outline:none; text-decoration: none!important;">
											<img src="{{installUrl}}images/email_header.png" alt="" width="78" height="79" style="border:none; text-decoration:none; -ms-interpolation-mode: bicubic; display:block; outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;"/>
										</a>
									</td>
									<td></td>
								</tr>
								<tr>
									<td style="border-left: 1px solid #ebebeb; border-top: 1px solid #ebebeb; border-radius: 5px 0 0 0;" bgcolor="white" cellpadding="0" cellspacing="0" border="0" height="50"></td>
									<td style="border-right: 1px solid #ebebeb; border-top: 1px solid #ebebeb; border-radius: 0 5px 0 0;" bgcolor="white" cellpadding="0" cellspacing="0" border="0" height="50"></td>
								</tr>
							</table>

							<table style="border-left: 1px solid #ebebeb; border-right: 1px solid #ebebeb; border-bottom: 1px solid #ebebeb; border-radius: 0 0 5px 5px;" bgcolor="white" cellpadding="0" cellspacing="0" border="0" width="100%" >
								<tr>
									<td valign="top" align="center">
										<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%">
											<tr>
												<td width="30"></td>
												<td>
													<table cellpadding="0" cellspacing="0" border="0" width="100%">
														<tr>
															<td>
																<a href="{{installUrl}}" target="_blank" style="outline:none; text-decoration: none!important;">
																	<span style="display: block; margin: 20px 0 40px 0; text-align: center">
																		<img src="{{installUrl}}images/email_logo.png" alt="{{siteName}}" height="auto" style="width:100%; max-width:370px; border:none; outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;">
																	</span>
																</a>
															</td>
														</tr>
														<tr>
															<td>
																<h3 style="font-family: Tahoma, Arial, sans-serif; color:#333333; font-size: 20px; font-weight: 300; margin-top: 0;">
																	{{newAccountSubject}}
																</h3>
																<hr style="-moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none; border-color: #eeeeee; border-image: none; border-style: solid none; border-width: 1px 0; height: 4px;" />
																
																<p style="font-family: Tahoma, Arial, sans-serif; font-size: 16px; line-height: 26px; margin: 0 0 10px 0; font-weight: 300; color: #555555;">
																	{{newAccountVar1}}: {{accEmail}}<br />
																	{{newAccountVar2}}: {{accPass}}
																</p>
																<p style="font-family: Tahoma, Arial, sans-serif; font-size: 16px; line-height: 26px; margin: 0 0 10px 0; font-weight: 300; color: #555555;">
																	{{newAccountVar3}}<br />
																	<a style="text-decoration: none; color: #2980B9; margin-right:10px;" href="{{installUrl}}activate.php?usrEmail={{usrEmail}}&hash={{hash}}">{{installUrl}}activate.php?usrEmail={{usrEmail}}&hash={{hash}}</a><br />
																	{{newAccountVar4}}
																</p>
																
																<hr style="-moz-border-bottom-colors: none; -moz-border-left-colors: none; -moz-border-right-colors: none; -moz-border-top-colors: none; border-color: #eeeeee; border-image: none; border-style: solid none; border-width: 1px 0; height: 4px;" />
																
																<p style="font-family: Tahoma, Arial, sans-serif; font-size: 16px; line-height: 20px; margin: 0 0 10px 0; font-weight: 300; color: #666666;">
																	{{thankYouText}},<br />
																	{{siteName}}
																</p>

																<p style="font-family: Tahoma, Arial, sans-serif; font-size: 13px; line-height: 18px; margin: 0 0 30px 0; font-weight: 300; color: #999999;">
																	<em>{{noReplyText}}</em>
																</p>
															</td>
														</tr>
														<tr>
															<td valign="top" align="center">
																<table cellpadding="0" cellspacing="0" border="0" align="center" width="250" >
																	<tr>
																		<td valign="top" align="center" bgcolor="#2472A4" style="display: block; border-radius:5px; background-image: -o-linear-gradient(90deg, #2980B9  0%, #2472A4 100%); background-image: -moz-linear-gradient(90deg, #2980B9  0%, #2472A4 100%); background-image: -webkit-linear-gradient(90deg, #2980B9  0%, #2472A4 100%); background-image: -ms-linear-gradient(90deg, #2980B9  0%, #2472A4 100%); background-image: linear-gradient(0deg, #2980B9  0%, #2472A4 100%);">
																			<a href="{{installUrl}}activate.php?usrEmail={{usrEmail}}&hash={{hash}}" target="_blank" style="display:inline-block; width:100%; height: 40px!important; font-family: Tahoma, Arial, sans-serif; font-size: 18px!important; line-height: 40px!important; font-weight: 300!important; color: white!important; text-decoration: none!important;">
																				{{newAccountBtnLink}} &raquo;
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
														<tr><td valign="top" height="30"></td></tr>
													</table>
												</td>
												<td width="30"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr><td valign="top" height="20"></td></tr>
					<tr>
						<td valign="top" align="center">
							<table cellpadding="0" border="0" style="line-height: 1.2em; font-family: Tahoma, Arial, sans-serif; border-spacing: 0; font-size: 100%;" cellspacing="0" width="100%" align="center">
								<tr valign="top">
									<td width="100%" style="border-spacing: 0;text-align: center;">
										<p style="text-align: center; margin: 0; padding: 5px 4px; font-size: 12px; color: #b8b8ba; font-weight: regular; line-height: 16px; font-family: Tahoma, Arial, sans-serif;  text-shadow: 0 1px 0 #fff;">
											 {{emailFooterText1}} {{siteName}} {{emailFooterText2}}.
										</p>
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>