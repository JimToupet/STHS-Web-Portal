<?php include('Connections/settings.php'); ?>
<?php include("includes/sessionInfo.php") ?>
<?php include("includes/functions.php") ?>
<?php include("includes/langfile.php") ?>
<?php include("includes/langs.php") ?>
<?php include("includes/langs_stats.php") ?>
<?php
switch ($lang){ 
case 'en': 
	$l_PlayerRatings = "Player Ratings";
	$l_NoTradeDescription = "A no trade clause will help convince the player to sign with your team.";
	$l_FrontLoadDescription = "&nbsp;&nbsp;EVEN = Salary will be the same each year of their contract.<br>&nbsp;&nbsp;FRONT-LOAD = Higher salary in first year and will gradually decrease until final year.";
	$l_SalaryDistribution = "Salary Distribution";
	$l_SalaryPerYear = "Salary Per Year";
	$l_SendOffer = "Send Offer";
	$l_Offer = "Offer Sheet";
	$l_True  = "True";
	$l_False  = "False";
	$l_CONTRACTLENGTH = "Contract Length";
	$Alert3 = "The owner of your team does not approve sending any more contract offers because you already have 10 active offers.  If you want to send an offer to this player, you will have to remove another offer first.";
	$Alert2_1 = "The owner of your team does not approve sending a contract greater than $";
	$Alert2_2 = "per year because there is not enough league competition for his services.  If more bids are placed then he will approve a higher offer.";
	$Alert1_1 = "Please enter a salary greater than $";
	$Alert1_2 = "per year.";
	$l_NoPermission = "You don't have permission to negotiate a contract with this player!";
	$l_rejectFinal = "This player has indicated he has no interest in signing a contract extension with your team.";
	$l_rejectWait = "The agent asks that you take 24 hours to think over a new offer.  So come back in 24 hours.";
	$l_AgentBargain = "Bargain with agent";
	$l_AskingPrice = "Asking price";
	$l_ContractAccepted = "Contract accepted";
	$l_years = "years";
	$l_perSeason = "per season";
	$l_NegStatus = "Negotiations status";
	$l_Neg1 = "You have not made any offers.";
	$l_Neg2 = "You have made ";
	$l_Neg3 = " offer.  ";
	$l_Neg4 = "You can make up to ";
	$l_Neg5 = "more offers. ";
	$l_Neg6 = "Contract extension talks have broke off and the player wishes to test the free agency market.";
	$l_OfferContract = "Contract extension";
	$l_Signed = "Signed Extension";
	$l_Odds1 = "<h4>You have a ";
	$l_Odds2 = ", he will resign with your team. </h4><em style='padding-left:135px; font-size:11px'>The site will generate a random number between 1 and 100. If the number is between 1 and ";
	$l_Odds3 = ", he will sign the contract.</em>";
	$l_YouOdds = "Your Odds";
	$l_OfferDeclined = "OFFER DECLINED";
	$l_FinScore1 = "Your final score of";
	$l_FinScore2 = "is greater than the odds of";
	$l_FinScore3 = "% beat the odds of";
	$l_OfferAccepted = "OFFER ACCEPTED";
	$l_Bonus = "Signing Bonus";
	break; 

case 'fr': 
	$l_PlayerRatings = "Stat de joueur";
	$l_NoTradeDescription = "Une clause de non-&eacute;change va aider a convaincre le joueur de signer avec votre &eacute;quipe.";
	$l_FrontLoadDescription = "&nbsp;&nbsp;EVEN = Le salaire sera le m&ecirc;me tous les ans de leur contrat.<br>&nbsp;&nbsp;FRONT-LOAD = Un salaire plus &eacute;lev&eacute; en la premi&egrave;re ann&eacute;e et diminuera graduellement jusqu'&agrave; l'ann&eacute;e finale.";
	$l_SalaryDistribution = "Distribution de salaire";
	$l_SalaryPerYear = "Salaire par an";
	$l_SendOffer = "Envoyez l'offre";
	$l_Offer = "Offre";
	$l_True  = "Vrai";
	$l_False  = "Faux";
	$l_CONTRACTLENGTH = "Longueur de contrat";
	$Alert3 = "Le propri&eacute;taire de votre &eacute;quipe n'approuve pas envoyer plus d'offres de contrat parce que vous avez d&eacute;j&agrave;  10 offres actives. Si vous voulez envoyer une offre &agrave;  ce joueur, vous devrez enlever une autre offre d'abord.";
	$Alert2_1 = "Le propri&eacute;taire de votre &eacute;quipe n'approuve pas envoyer un contrat plus grand que ";
	$Alert2_2 = "$ par an parce qu'il n'y a pas assez de concurrence de ligue pour ses services. Si plus d'offres sont plac&eacute;es alors il approuvera un plus haut offrent.";
	$Alert1_1 = "Veuillez &eacute;crire un salaire plus grand que ";
	$Alert1_2 = "$ ann&eacute;e.";
	$l_NoPermission = "Vous n'avez pas la permission d'&ecirc;tre en pourparlers un contrat avec ce joueur !";
	$l_rejectFinal = "Ce joueur a indiqu&eacute; qu'il n'a aucun int&eacute;r&ecirc;t en signant une extension de contrat avec votre &eacute;quipe.";
	$l_rejectWait = "L'agent demande que vous prenez 24 heures pour penser au-dessus d'une nouvelle offre. Ainsi revenu en 24 heures.";
	$l_AgentBargain= "Negocier avec l'agent";
	$l_AskingPrice = "Prix demand&eacute;";
	$l_ContractAccepted = "Le contrat acceptent";
	$l_years = "ann&eacute;es";
	$l_perSeason = "par saison";
	$l_NegStatus = "Statut de n&eacute;gociations";
	$l_Neg1 = "Vous n'avez fait aucune proposition.";
	$l_Neg2 = "Vous avez fait ";
	$l_Neg3 = " offre.  ";
	$l_Neg4 = "Vous pouvez composer &agrave;  ";
	$l_Neg5 = "plus offre. ";
	$l_Neg6 = "L'extension de contrat que les entretiens ont a interrompu et le joueur souhaite examiner le march&eacute; d'agence libre.";
	$l_OfferContract = "Extension de contrat";
	$l_Signed = "Extension de sign&eacute;e";
	$l_Odds1 = "<h4>Vous avez ";
	$l_Odds2 = ", il d&eacute;missionnera avec votre &eacute;quipe. </h4><em style='padding-left:135px; font-size:11px'>L'emplacement produira d'un &agrave;  nombre al&eacute;atoire entre 1 et 100. Si le nombre est entre 1 et";
	$l_Odds3 = ", il sign&eacute;e avec votre &eacute;quipe.</em>";
	$l_YouOdds = "Votre chance";
	$l_OfferDeclined = "L'OFFRE A REJET&eacute;";
	$l_FinScore1 = "Vos points finaux de";
	$l_FinScore2 = "est plus grande que la chance de";
	$l_FinScore3 = "% gagnez la chance de";
	$l_OfferAccepted = "L'OFFRE A ACCEPT&eacute;";
	$l_Bonus = "Bonification de contrat";
	break;
} 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title><?php echo $l_OfferContract; ?> - <?php echo $_SESSION['SiteName'] ; ?></title>

<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/html5.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/menu.css">
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery.accessible-news-slider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/jquery-ui-1.8.custom.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/header.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/tipsy.css">   
<link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['DomainName']; ?>/css/bubbletip.css" />



<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jcarousellite_1.0.1c4.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/formly.min.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.pop.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery.tipsy.js"></script> 
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/ui.core.js"></script>
<script type="text/javascript" src="<?php echo $_SESSION['DomainName']; ?>/js/jquery-ui-1.8.custom.min.js"></script>

<!--[if lte IE 9]>
<script src="<?php echo $_SESSION['DomainName']; ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<script type="text/javascript">
$(function(){ 
  $('#cssdropdown li.headlink').hover(
		function() { $('ul', this).css('display', 'block'); },
		function() { $('ul', this).css('display', 'none'); });
});;
</script>

<style media="all" type="text/css">
#container {background-image:url(<?php echo $_SESSION['DomainName']; ?>/image/headers/<?php echo $_SESSION['current_HeaderImage']; ?>); background-color:#<?php echo $_SESSION['current_PrimaryColor'];?>;}
a {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
table.tablesorter thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th { background-color: #<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorter thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
table.tablesorterRates thead tr th a{ color:#<?php echo $_SESSION['current_TextColor']; ?>;}
footer { background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#FatFooter { background-color:#<?php echo $_SESSION['current_SecondaryColor']; ?>; color:#<?php echo $_SESSION['current_TextColor']; ?>;}
<?php if ($_SESSION['current_SecondaryColor'] == $_SESSION['current_PrimaryColor']){ echo "#FatFooter a { color:#".$_SESSION['current_TextColor']."; } "; } ?>
h3 {color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
#cssdropdown, #cssdropdown ul {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
nav {background-color:#<?php echo $_SESSION['current_PrimaryColor']; ?>;}
</style>
</head>

<body>
<div align="center">
<div id="wrapper">
<?php include("includes/header.php"); ?>
<?php include("includes/nav.php"); ?>

<article>
	<!-- RIGHT HAND SIDE BAR GOES HERE -->
    <!--<aside></aside>-->
    
	<!-- MAIN PAGE CONTENT GOES HERE -->
    <section>
    <h2><?php echo $l_OfferContract; ?> - <?php echo $_SESSION['SiteName'] ; ?></h2>sdf
 	</section>
</article>
 
<?php include("includes/footer.php"); ?>
</div>
</div>
</body>
</html>
