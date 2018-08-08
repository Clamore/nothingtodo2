<!--#include file="connect.asp" -->
<%
Dim chk,id,sql,rec,sqlcount,recount,insertcount,execount
id = Request.QueryString("id")
chk = Request.QueryString("chk")

If chk = "edu" Then 
	sql = "SELECT * FROM education WHERE eduid = '" & id & "' "
Else 
	sql = "SELECT * FROM lecture WHERE lec_id = '" & id & "' "
End If 
Set rec = con.Execute(sql)
If Not rec.EOF Then 
	If chk = "edu" Then 
		title = rec.fields("eduname").value
		file = rec.fields("eduvdo").value

		sqlcount = "SELECT MAX(num) AS num FROM medcon_watch "
		Set recount = con.execute(sqlcount)
		If Not recount.EOF Then 
			num = recount.fields("num").value+1
			insertcount = "INSERT INTO medcon_watch(eduid,of_id) VALUES('" & id & "','" & Session("user") & "')"
			Set execount=con.execute(insertcount) 
		End If 		
	Else 
		title = rec.fields("lec_name").value
		file = rec.fields("lec_file").value

		sqlcount = "SELECT MAX(num) AS num FROM lecture_watch "
		Set recount = con.execute(sqlcount)
		If Not recount.EOF Then 
			num = recount.fields("num").value+1
			insertcount = "INSERT INTO lecture_watch(lec_id,of_id) VALUES('" & id & "','" & Session("user") & "')"
			'Response.write(insertcount)
			Set execount=con.execute(insertcount) 
		End If 		
	End If 
End If 
%>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<!-- Website Design By: www.happyworm.com -->
<title><%=Response.write(title)%></title>
<meta http-equiv="Content-Type" content="text/html; charset=TIS-620" />
<link href="../../dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../../lib/jquery.min.js"></script>
<script type="text/javascript" src="../../dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	
	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			ready = true;
			$(this).jPlayer("setMedia", {
				title: "<%=Response.write(title)%>",
				//flv: "medcon_30_08_60.flv",
				//m4v: "medcon_30_08_60.m4v",
				//ogv: "medcon_30_08_60.ogv",
				mp4: "video/<%=Response.write(file)%>",
				webmv: "video/<%=Response.write(file)%>",
				//webmv: "http://www.jplayer.org/video/webm/Big_Buck_Bunny_Trailer.webm",
				//poster: "http://www.jplayer.org/video/poster/Big_Buck_Bunny_Trailer_480x270.png"
				
			});
			$(this).jPlayer("play", 1); //Add auto play 7/8/2018
		},
		swfPath: "../../dist/jplayer",
		supplied: "webmv, ogv, m4v,mp4",
		size: {
			width: "640px",
			height: "360px",
			cssClass: "jp-video-360p"
		},
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true,
		remainingDuration: true,
		toggleDuration: true
	});

});
//]]>
</script>
</head>
<body>
<div id="jp_container_1" class="jp-video jp-video-360p" role="application" aria-label="media player">
	<div class="jp-type-single">
		<div id="jquery_jplayer_1" class="jp-jplayer"></div>
		<div class="jp-gui">
			<div class="jp-video-play">
				<button class="jp-video-play-icon" role="button" tabindex="0">play</button>
			</div>
			<div class="jp-interface">
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar"></div>
					</div>
				</div>
				<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
				<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
				<div class="jp-controls-holder">
					<div class="jp-controls">
						<button class="jp-play" role="button" tabindex="0">play</button>
						<button class="jp-stop" role="button" tabindex="0">stop</button>
					</div>
					<div class="jp-volume-controls">
						<button class="jp-mute" role="button" tabindex="0">mute</button>
						<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
						<div class="jp-volume-bar">
							<div class="jp-volume-bar-value"></div>
						</div>
					</div>
					<div class="jp-toggles">
						<button class="jp-repeat" role="button" tabindex="0">repeat</button>
						<button class="jp-full-screen" role="button" tabindex="0">full screen</button>
					</div>
				</div>
				<div class="jp-details">
					<div class="jp-title" aria-label="title">&nbsp;</div>
				</div>
			</div>
		</div>
		<div class="jp-no-solution">
			<span>Update Required</span>
			To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
		</div>
	</div>
</div>

<br>

<p>
	หากมีปัญหาในการรับชมติดต่อได้ที่ หน่วยเวชสารสนเทศ ตึกอัษฎางค์ ชั้น 4 ห้อง 401 เบอร์โทรศัพท์ 02-419-7767-9 ต่อ 111
</p>
</body>

</html>
