function Chat(Choix)

{

	document.write('<FORM NAME="LeFormChat">');

	document.write('<CENTER><TABLE BORDER="0" CELLPADDING="1" CELLSPACING="0" BGCOLOR="#000000" WIDTH="300"><TR><TD>');

	document.write('<TABLE BORDER="0" CELLPADDING="10" CELLSPACING="0" BGCOLOR="#FFFFFF" WIDTH="100%">');

	document.write('<TR>');

	document.write('<TD WIDTH="50%">');

	document.write('<P>votre pseudo :<BR>');

	document.write('<INPUT TYPE="text" NAME="LePseudo" VALUE="Pseudonyme" SIZE=12 MAXLENGTH=12>');

	document.write('</TD>');

	document.write('<TD WIDTH="50%">');

	if (Choix == "officiels")

	{

		document.write('<P>votre salon :<BR>');

		document.write('<SELECT NAME="LeSalon">');

		document.write('<OPTION VALUE="tolkien" SELECTED>#tolkien');

		document.write('<OPTION VALUE="tolkien-debats">#tolkien-debats');

		document.write('<OPTION VALUE="tolkien-film">#tolkien-film');

		document.write('<OPTION VALUE="tolkien-jeux">#tolkien-jeux');

		document.write('<OPTION VALUE="langues-elfiques">#langues-elfiques');

		document.write('<OPTION VALUE="">');

		document.write('<OPTION VALUE="smial-idf">#smial-idf');

		document.write('<OPTION VALUE="smial-ouest">#smial-ouest');

		document.write('<OPTION VALUE="smial-sud">#smial-sud');

		document.write('<OPTION VALUE="smial-est">#smial-est');

		document.write('<OPTION VALUE="smial-nord">#smial-nord');

		document.write('<OPTION VALUE="">');

		document.write('<OPTION VALUE="aide">#aide');

		document.write('<OPTION VALUE="sf">#sf');

		document.write('<OPTION VALUE="fantasy">#fantasy');

		document.write('<OPTION VALUE="contes">#contes');

		document.write('<OPTION VALUE="jdr">#jdr');

		document.write('<OPTION VALUE="quizz">#quizz');

		document.write('</SELECT></TD>');

		document.write('</TR>');

		document.write('<TR>');

		document.write('<TD>&nbsp;</TD>');

	}

	document.write('<TD ALIGN="right">');

	document.write('<INPUT TYPE="button" NAME="go" value="Chat !" onClick="GoChat(&quot;' + Choix + '&quot;);">');

	document.write('</TD>');

	document.write('</TR>');

	document.write('</TABLE>');

	document.write('</TD></TR></TABLE></CENTER>');

	document.write('</FORM>');

}



function GoChat(Choixe)

{

	ZePseudo = document.LeFormChat.LePseudo.value;

	ZeAdresse = self.location.host;

	

	if (Choixe == "officiels")

	{

		for (i = 0; i < document.LeFormChat.LeSalon.length; i++)

		{

			if (document.LeFormChat.LeSalon.options[i].selected == true)

			{

				ZeSalon = document.LeFormChat.LeSalon.options[i].value;

			}

		}

	}

	else

	{

		ZeSalon = Choixe;

	}

	var ZeURL = "http://www.tolkienfrance.com/irc/chat.php";

	var ZeOptions = "?mychan=" + ZeSalon + "&mynick=" + ZePseudo + "&source=" + ZeAdresse + "&direct=1";

	var ZeParametre = ZeURL + ZeOptions;

	window.open(ZeParametre, "LeMatoo", "resizable=no,location=no,toolbar=no,status=no,directories=no,scrollbars=no,width=680,height=550")

}

