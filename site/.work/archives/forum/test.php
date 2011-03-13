<HTML>
    <HEAD>
        <TITLE>Ins�rer des bulles d'informations</TITLE>
        <SCRIPT Language="Javascript">
        <!--
            var infoBulleUid = 0;
	
            function InfoBulle(jsObject, caption, timer, cssClass)
			{
              if ((navigator.appName.indexOf("Explorer") == -1) || (navigator.appVersion.substring(0,3)*1 < 4))
			    return;

              var currentUID = infoBulleUid++;
				
              document.write('<SPAN Id="IB' + currentUID + '" Class="' + cssClass
                            + '" Style="display:none; position: absolute;">'
                            + caption + '</SPAN>');
              jsObject.infoBulle = document.all["IB" + currentUID];
              jsObject.timer = timer;
              jsObject.clockId = null;

              jsObject.onmouseout = function InfoBulle_onMouseOut() {
                  this.infoBulle.style.display = "none";
                  if (this.clockId != null) clearTimeout(this.clockId);
              }

              jsObject.onmouseover = function InfoBulle_onMouseOver() {
                  var htmlString = 'document.all["' + this.id + '"].infoBulle'
                                 + '.style.display = "block"; ';
                  this.clockId = setTimeout(htmlString, this.timer);
              }

              jsObject.onmousemove = function InfoBulle_onMouseMove() {
                  this.infoBulle.style.left = event.x + document.body.scrollLeft
                                            - this.infoBulle.clientWidth/2;
                  this.infoBulle.style.top  = event.y + document.body.scrollTop
                                            + 20;
              }
            }
        //-->
        </SCRIPT>
        <STYLE>
        <!--
            .infoBulle {
                text-align: center;
                font-family: verdana;
                font-size: 10pt;
                background-color: #FFFFFF;
                color: #00A0FF;
                border: solid 2px #0080E0;
                padding-left: 2px;
                padding-right: 2px;
            }
        -->
        </STYLE>
    </HEAD>
    <BODY>
        <H1>Ins�rer des bulles d'informations
        </H1>

        <P Id="MonParagraphe">
            En laissant la souris sur ce paragraphe
            durant une seconde, vous obtiendrez une bulle
            d'information
        </P>Ceci est un petit paragraphe

        <SCRIPT Language="Javascript">
        <!--
            new InfoBulle(document.all["MonParagraphe"],
                          "Ceci est un petit paragraphe",
                          10,           // 1 seconde
                          "infoBulle");   // Classe CSS
        //-->
        </SCRIPT>
<br /><br /><br />
</body>
<HTML>
