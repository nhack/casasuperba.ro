<?php
$db = new mysqli('localhost', 'casasu20_casasup', '04qPMFsJwwbcbEbgiU-JCM44rkXfTb35', 'casasu20_casasuperba');

if ($db->connect_errno) {
  // @TODO log
  error_log('Failed to connect to DB ['.$db->connect_error.'] (index.php)');
}// end if

$db->set_charset("utf8");

// get the counter
$counter = $db->query('SELECT `counter` FROM `counter` WHERE `id` = "a"');

if ($counter->num_rows) {
  $counter = $counter->fetch_object()->counter + 1;

  // update the counter
  $db->query("UPDATE `counter` SET `counter` = '".$counter."' WHERE `id` = 'a'");
} else {
  $counter = '';
}// end else


if (array_key_exists('contact-submit', $_POST) && $_POST['contact-submit'] != false) {
  if ( ($_POST['contact-name'] != "") && ($_POST['contact-email'] != "") && ($_POST['contact-message'] != "") ) {

    // validate the email address
    $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i"; 

    if (preg_match($pattern, trim(strip_tags($_POST['contact-email'])))) { 
      $_POST['contact-email'] = trim(strip_tags($_POST['contact-email'])); 

      $headers = "From: " . 'Contact site <contact@casasuperba.ro>' . "\r\n";
      $headers .= "Reply-To: ". strip_tags($_POST['contact-email']) . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

      $message = '<html><body>De la : ' . strip_tags($_POST['contact-name']) . '<br>' . 'E-mail: ' . strip_tags($_POST['contact-email']) . '<br>' . 'Telefon: ' . strip_tags($_POST['contact-telephone']) . '<br>' . 'Mesaj: ' . nl2br(htmlentities($_POST['contact-message'])) . '</body></html>';
    
      @mail('Anca Golopenta <anca.golopenta@casasuperba.ro>', 'Mesaj nou', $message, $headers);
      @mail('Razvan Golopenta <razvan.golopenta@casasuperba.ro>', 'Mesaj nou', $message, $headers);

      $_POST['contact-submit'] = null;
      $_POST['contact-name'] = null;
      $_POST['contact-email'] = null;
      $_POST['contact-telephone'] = null;
      $_POST['contact-message'] = null;

      echo '<script>alert("Mesajul s-a trimis. Iti multumim.");</script>';

    } else { 
      echo '<script>alert("Adresa de email nu este scrisa corect. Incearca din nou.");</script>';
     }// end else 

  } else {
    echo '<script>alert("Nu ai completat toate campurile obligatorii (numele, adresa de email, mesajul). Incearca din nou.");</script>';
  }// end else
}// end if

?><!DOCTYPE html><html><head><meta charset="UTF-8"><title>Proiectare structuri de rezistenta pentru case, hale industriale.</title><meta name="description" content="Proiectare case si hale industriale Timisoara. Suntem specializati in proiectare structuri de rezistenta pentru constructii civile, case de vanzare." />
<style type="text/css">body,html{height:100%;margin:0;padding:0;width:100%}a,input,button{outline:0}@font-face{font-family:'ff1';src:url('http://assets.casasuperba.ro/ff1.woff') format('woff')}@font-face{font-family:'ff2';src:url('http://assets.casasuperba.ro/ff2.woff') format('woff')}.header{background:#fff;border-style:solid;border-color:#eee;border-width:0 0 1px 0;height:100px;width:100%;z-index:1000}.header_container{margin:0 auto;width:1020px}.fixed{position:fixed}.float_l{float:left}.float_r{float:right}.frame_1{background-color:#f1f1f1;height:650px;top:100px}.logo{background:#5cb7e7 url('http://assets.casasuperba.ro/home.05121301.png') no-repeat center center;border-radius:50%;height:60px;width:60px}.logo_container{height:100%;margin:20px 0}.main_container{background:#fff;color:#444;width:100%}.nav{font-family:ff1,arial;font-size:16px;font-weight:400;line-height:60px;margin:0 0 0 20px}.nav_a{color:#444;text-decoration:none}.nav_container{height:100%;margin:20px 0}.slider{background-position:center center;background-size:cover;height:100%;width:100%}.slider_1{background-image:url('http://assets.casasuperba.ro/slider_1.13121301.jpg')}.rel{position:relative}

.contact-container {margin: 40px 0 20px 0;}
.contact-input {border-color: #d0d0d0;border-style: solid;border-width: 1px;font-size: 12px;font-family: arial;margin: 0 0 20px 0;padding: 5px;vertical-align: middle;width: 550px;}
.contact-submit {background: #5CB7E7;border-style: solid;border-width: 0;border-radius: 2px;color: #ffffff;cursor: pointer;font-family: arial;font-size: 15px;padding: 2px 0;text-align: center;width: 100px;}
.contact-textarea {height: 100px;}</style>
<link rel="stylesheet" href="http://assets.casasuperba.ro/main.06121301.min.css" type="text/css"><link rel="shortcut icon" href="http://assets.casasuperba.ro/favicon.05121301.png"></head>
<body id="body">

<div class="main_container rel">
  <div class="fixed header">
    <div class="header_container">
      <div class="float_l logo_container">
        <a class="nav_a" href="#home"><div class="logo"></div></a>
      </div>
      <div class="float_r nav_container">
        <ul class="ul"><li class="float_l nav"><a class="nav_a" href="#despre_noi">Despre noi</a></li><li class="float_l nav"><a class="nav_a" href="#proiectare">Proiectare</a></li><li class="float_l nav"><a class="nav_a" href="#clienti_colaboratori">Clienti si colaboratori</a></li><li class="float_l nav"><a class="nav_a" href="#pentru_arhitecti">Pentru arhitecti</a></li><li class="float_l nav"><a class="nav_a" href="#lucrari_realizate">Lucrari realizate</a></li><li class="float_l nav"><a class="nav_a" href="#case_de_vanzare">Case de vanzare</a></li><li class="float_l nav"><a class="nav_a" href="#contact">Contact</a></li></ul>
      </div>
    </div>
  </div>
  
  <div class="rel frame_1" id="home">
    <div class="slider slider_1" id="slider">
      <div class="rel slider_container">
        <div class="slider_motto_container">
          <div class="float_l slider_motto_left" id="motto_left"></div>
          <div class="float_l slider_motto_center text_shadow">din 1994 in constructii</div>
          <div class="float_l slider_motto_right" id="motto_right"></div>
         </div>
        <div class="slider_title text_shadow">Proiecte complete</div>
      </div>
    </div>
  </div>
  
  <div class="rel frame_2" id="despre_noi">
    <div class="rel slider_container">
      <div class="about_us_title">Proiectare case si hale</div>
      <div class="about_us_left">
        S.C. R.G. Raal Prod Serv SRL - firma noastra este fondata in anul 1994, avand ca obiect de activitate constructiile. Cu o vasta experienta in domeniul constructiilor, in anul 2007 ne-am extins activitatea intocmind si proiecte de rezistenta.<br>Pentru a putea rezista pe o piata in tranzitie si pentru a avea succes a trebuit sa dam dovada de profesionalism si seriozitate. In prezent avem elaborate peste 250 de proiecte.<br>Dupa 19 ani de experienta putem oferi stabilirea de solutii optime, optimizari de costuri, consultanta si proiectare la un nivel de calitate superior in cel mai scurt timp.<br><br>Echipa noastra este specializata in proiectare structuri de rezistenta pentru:
	      <ul class="rel ul"><li class="about_us_li"><div class="abs li_dots"></div>constructii civile (case, blocuri)</li><li class="about_us_li"><div class="abs li_dots"></div>constructii industriale (hale industriale din metal, din beton, din lemn)</li><li class="about_us_li"><div class="abs li_dots"></div>bazine de mari dimensiuni metalice si din beton.</li></ul>
      </div>
      <div class="about_us_right abs" id="about_us_right"></div>
      
    </div>
  </div>
  
  <div class="rel frame_3" id="proiectare">
   <div class="rel slider_container">
    <div class="float_l frame_3_left">
      <ul class="ul"><li>proiectare de rezistenta</li><li>proiectare de arhitectura</li><li>proiectare de instalatii</li><li>verificari la toate cerintele</li><li>stabilirea de solutii optime</li></ul>
    </div>
    <div class="dib frame_3_center">
      Proiectare
    </div>
    <div class="float_r frame_3_right">
      <ul class="ul"><li>intocmire de devize</li><li>urmarire de santier</li><li>obtinerea de avize - acorduri</li><li>optimizari de costuri</li><li>scenarii de incendiu</li></ul>
    </div>
   </div>
  </div>
  
  <div class="rel frame_4" id="clienti_colaboratori">
    <div class="rel slider_container">
      <div class="float_l frame_4_left">
        <div class="frame_4_title">Clienti si colaboratori</div>
	      <div class="frame_4_circle">
	        Clinica de Bere Terapia<br>SC Smithfield Ferme SRL - noul COMTIM<br>Nedex Grup<br>Gateway Construct<br>Grup Construct<br>Avcoz Edil<br>Luz Construct<br>CEN Construct<br>Mobistil Prod<br>City Media<br>Leman Industrie<br>Redoxim<br>Geo Tols<br>Agro Comert<br>Elimecro<br>DAB
	      </div>
	    </div>
	    <div class="dib">
	     <div class="frame_4_title">Arhitecti colaboratori</div>
	     <div class="frame_4_circle">
	       Arh. Albu Bogdan<br>Arh. Babescu Cristina<br>Arh. Boltres Cristian<br>Arh. Bratiloveanu Olivian<br>Arh. Brihacescu Lucian<br>Arh. Cordun Tudor<br>Arh. Cotelea Dan<br>Arh. Desporovics Roxana<br>Arh. Folea Doru<br>Arh. Jichita Mirel<br>Arh. Nenad Luchin<br>Arh. Nicoara Vlad<br>Arh. Raducanu Samuel<br>Arh. Stoian Laurentiu<br>Arh. Suteu Miron<br>Arh. Zbughin Doina
	     </div>
	    </div>
    </div>
  </div>
  
  <div class="rel frame_5" id="pentru_arhitecti">
    <div class="rel slider_container">
      <div class="float_l">
        <div class="frame_5_title text_shadow">Pentru arhitecti</div>
        <div class="frame_5_text">Oferim consultanta si proiecte de rezistenta firmelor de arhitectura la un nivel de calitate superior in cel mai scurt timp posibil.</div>
      </div>
    </div>
  </div>
  
  <div class="rel frame_6" id="lucrari_realizate">
    <div class="rel slider_container">
      <div class="dib">
	      <ul class="ul" id="frame_6_gallery">
	        <li class="float_l frame_6_li" >
	          <a href="http://assets.casasuperba.ro/frame_6_1.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cordun Tudor: Castel Royal - Clinica de bere Terapia"><img class="frame_6_img opacity0 to02l" src="http://assets.casasuperba.ro/no-img.gif" data-src="http://assets.casasuperba.ro/frame_6_1s.jpg" width="247" height="139" alt=""/></a>
	          <div class="frame_6_title">
	            Lucrari realizate
	          </div>
	        </li>
	        <li class="float_l frame_6_li" ><a href="assets/frame_6_2.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cordun Tudor: Castel Royal - Clinica de bere Terapia"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_2s.jpg" width="247" height="288" alt=""/></a></li>
	        <li class="float_l frame_6_li"><a href="assets/frame_6_3.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cordun Tudor: Castel Royal - Clinica de bere Terapia"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_3s.jpg" width="247" height="139" alt=""/></a><a href="assets/frame_6_4.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cordun Tudor: Bloc Luca"><img class="frame_6_img opacity0 to02l" src="" data-src="assets/frame_6_4s.jpg" width="247" height="139" alt=""/></a></li>
	        <li class="float_l frame_6_li frame_6_li_fix"><a href="assets/frame_6_5.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cordun Tudor: Bloc Luca"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_5s.jpg" width="247" height="139" alt=""/></a><a href="assets/frame_6_6.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cordun Tudor: hala Powertek"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_6s.jpg" width="247" height="139" alt=""/></a></li>
	        <li class="float_l frame_6_li"><a href="assets/frame_6_7.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cotelea Dan: Casa Cub"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_7s.jpg" width="247" height="139" alt=""/></a></li>
	        <li class="float_l frame_6_li"><a href="assets/frame_6_8.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cotelea Dan: Cotulbea"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_8s.jpg" width="247" height="139" alt=""/></a></li>
	        <li class="float_l frame_6_li"><a href="assets/frame_6_9.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cotelea Dan: Cuc"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_9s.jpg" width="247" height="139" alt=""/></a></li>
	        <li class="float_l frame_6_li frame_6_li_fix"><a href="assets/frame_6_10.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cotelea Dan: Kozar"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_10s.jpg" width="247" height="139" alt=""/></a></li>
	        <li class="float_l frame_6_li"><a href="assets/frame_6_11.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cotelea Dan: Ogedey"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_11s.jpg" width="247" height="139" alt=""/></a></li>
	        <li class="float_l frame_6_li"><a href="assets/frame_6_12.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cotelea Dan: Simonis"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_12s.jpg" width="247" height="139" alt=""/></a></li>
	        <li class="float_l frame_6_li"><a href="assets/frame_6_13.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cotelea Dan: Tataran"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_13s.jpg" width="247" height="139" alt=""/></a></li>
	        <li class="float_l frame_6_li frame_6_li_fix"><a href="assets/frame_6_14.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cotelea Dan: Adi Dan"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_14s.jpg" width="247" height="139" alt=""/></a></li>
	        <li class="float_l frame_6_li"><a href="assets/frame_6_15.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Cotelea Dan: Adi Dan"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_15s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_16.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Albu Bogdan: bloc Terovan"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_16s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_17.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Brihacescu Lucian: Pelineagra"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_17s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li frame_6_li_fix"><a href="assets/frame_6_18.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Despotovisc Roxana: Marinescu"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_18s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_19.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Despotovisc Roxana: Marinescu"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_19s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_20.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Despotovisc Roxana: Popa"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_20s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_21.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Despotovisc Roxana: Popa"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_21s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li frame_6_li_fix"><a href="assets/frame_6_22.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Despotovisc Roxana: Popovici"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_22s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_23.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Despotovisc Roxana: Popovici"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_23s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_24.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Despotovisc Roxana: Serban"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_24s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_25.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Despotovisc Roxana: Serban"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_25s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li frame_6_li_fix"><a href="assets/frame_6_26.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Despotovisc Roxana: gri"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_26s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_27.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Despotovisc Roxana: gri"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_27s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_28.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Jichita Mirel: Alin"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_28s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_29.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Jichita Mirel: bloc Banateanul"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_29s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li frame_6_li_fix"><a href="assets/frame_6_30.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Jichita Mirel: bloc Ovidiu"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_30s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_31.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Jichita Mirel: Cabana Svinita"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_31s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_32.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Jichita Mirel: Casa Golopenta"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_32s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_33.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Jichita Mirel: Casa Golopenta"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_33s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li frame_6_li_fix"><a href="assets/frame_6_34.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Jichita Mirel: Dan"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_34s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_35.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Jichita Mirel: hala Radauti"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_35s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_36.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Jichita Mirel: Nicolici - Paunescu"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_36s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_37.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Jichita Mirel"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_37s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li frame_6_li_fix"><a href="assets/frame_6_38.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Arh. Zbughin Doina: hala cu 2 poduri"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_38s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_39.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Cruce Carst"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_39s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_40.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Cruce Carst"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_40s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_41.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Manastire - Tara Almajului"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_41s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li frame_6_li_fix"><a href="assets/frame_6_42.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="Manastire - Tara Almajului"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/frame_6_42s.jpg" width="247" height="139" alt=""/></a></li>
          <li class="float_l frame_6_li"><a href="assets/frame_6_43.jpg" rel="nofollow" data-lightbox="lucrari_realizate" title="bazin Smithfield"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" width="247" data-src="assets/frame_6_43s.jpg" height="139" alt=""/></a></li>
	      </ul>
       </div>
    </div>
  </div>
  
  <div class="rel frame_7" id="case_de_vanzare">
    <div class="rel slider_container">
      <div class="frame_7_title">Case de vanzare</div>
      <ul class="ul">
        <li class="dib frame_7_li" id="house_1">
          <img class="frame_7_img opacity0 to02l" id="frame_7_img" src="assets/no-img.gif" data-src="assets/frame_7_1.05121301.jpg" width="326" height="180" alt="" />
          <div class="frame_7_li_title">Casa AMR - Timisoara<br>zona Freidorf, Timisoara</div>
          <div class="frame_7_button">Detalii</div>
        </li>
      </ul>
    </div>
  </div>
  
  <div class="rel frame_8" id="contact">
    <div class="rel slider_container">
      <div class="dib frame_8_left" style="width:600px;">
        <div class="frame_8_title">Contact</div>
         SC R.G. RAAL PROD-SERV SRL
        <ul class="frame_8_ul"><li class="float_l frame_8_li_left"><span class="frame_8_span">Razvan Golopenta</span><br>Tel. 0723694214<br>razvan.golopenta@casasuperba.ro</li><li class="float_l"><span class="frame_8_span">Anca Golopenta</span><br>Tel. 0724302888<br>anca.golopenta@casasuperba.ro</li></ul>
        <div class="float_l"><br><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fcasasuperba&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35&amp;appId=447570715354767" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:35px;" allowTransparency="true"></iframe></div>
      </div>
      <a href="http://maps.google.com/maps?ll=45.7588,21.2025&spn=0.000485,0.001145&z=17" rel="nofollow" target="_blank"><div class="float_r frame_8_right" id="frame_8_right"></div></a>
    
    <div class="contact-container">
      <form name="input" action="index.php" method="post">
      <input class="contact-input" name="contact-name" placeholder="Numele si Prenumele">
      <br>
      <input class="contact-input" name="contact-email" placeholder="Adresa de Email">
      <br>
      <input class="contact-input" name="contact-telephone" placeholder="Telefon">
      <br>
      <textarea class="contact-input contact-textarea" name="contact-message" placeholder="Mesaj"></textarea>
      <br>
      <input class="contact-submit" name="contact-submit" type="submit" value="Trimite">
      </form>
    </div>
    </div>
  </div>
  
  <div class="footer"><div class="footer_container">Proiectare case si hale © 2014. Toate drepturile rezervate. Dezvoltat cu pasiune in Timisoara, de <a class="footer_a" href="http://www.redcic.ro">CIC Studio</a><div class="float_r" id="counter"><?php if ($counter) {echo $counter . ' vizite';} ?></div></div></div>
</div>


<div class="dn fixed overlay" id="overlay"></div>
<div class="dn fixed overlay_wrapper" id="overlay_wrapper">
  <div class="fixed overlay_close" id="overlay_close">Inchide</div>
  <div class="overlay_container">
    <div class="dib overlay_left">
      <div class="overlay_left_title">Casa AMR - Timisoara<div class="overlay_left_subtitle">zona Freidorf, Timisoara</div></div>
      <div class="overlay_subtitle">Utilitati</div>
        <ul class="overlay_list_ul ul"><li>curent</li><li>televiziune prin cablu</li><li>gaz</li><li>telefonie fixa</li><li>internet</li><li>serviciu colectare gunoi</li><li>iluminat stradal</li></ul>
        
        <div class="overlay_subtitle">Suprafete</div>
        <ul class="overlay_list_ul ul"><li>suprafata teren 318 m<sup>2</sup></li><li>suprafata parter 71 m<sup>2</sup></li><li>suprafata mansarda 74 m<sup>2</sup></li><li>front stradal 14,1 ml</li><li>teren liber 247 m<sup>2</sup></li><li>suprafata desfasurata 145 m<sup>2</sup></li></ul>
        
        <div class="overlay_subtitle">Materiale folosite</div>
        <ul class="overlay_list_ul ul"><li>fundatia - din beton armat cu adancime de 90 cm, latime 50 cm si doua centuri antiseismice cu termoizolatie</li><li>hidroizolatia - membrana de bitum cu nisip</li><li>zidaria - din caramida de 25 cm</li><li>stalpi, centuri, grinzi, planseu, scara - din beton armat</li><li>mansarda - din zidarie cu stalpi si centuri</li><li>acoperisul - de tip sarpanta din lemn</li><li>asteriala - din scandura</li><li>folie - Bramac</li><li>tigla - Elpreco</li><li>izolatie termica - din polistiren de 10 cm</li><li>tamplarie PVC - culoare maro</li></ul>
     
        <div class="overlay_subtitle">Interior casa</div>
        <ul class="overlay_list_ul ul">
          <li><a class="overlay_link" href="assets/casa_amr_plan_arhitectura_parter.28111301.pdf" rel="nofollow" target="_blank">plan arhitectura parter (PDF)</a></li>
          <li><a class="overlay_link" href="assets/casa_amr_plan_arhitectura_mansarda.28111301.pdf" rel="nofollow" target="_blank">plan arhitectura mansarda (PDF)</a></li>
        </ul>
        
        
    </div>
    <div class="float_r overlay_right">
      <div class="overlay_subtitle">Poze exterior casa</div>
      <div class="overlay_gallery" style="height:136px;">
        <ul class="ul" id="house_1_i_1"><li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_2_1.jpg" rel="nofollow" data-lightbox="casa_amr_2" title="Casa AMR - Timisoara"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_2_1s.jpg" width="126" height="126" alt=""/></a></li><li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_2_2.jpg" rel="nofollow" data-lightbox="casa_amr_2" title="Casa AMR - Timisoara"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_2_2s.jpg" width="126" height="126" alt=""/></a></li><li class="float_l overlay_gallery_li overlay_gallery_li_fix"><a href="assets/gallery_amr_house_2_3.jpg" rel="nofollow" data-lightbox="casa_amr_2" title="Casa AMR - Timisoara"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_2_3s.jpg" width="126" height="126" alt=""/></a></li></ul>
      </div>
   
      <div class="overlay_subtitle">Poze stadiul lucrarii</div>
      <div class="overlay_gallery" style="height:950px;">
	      <ul class="ul" id="house_1_i_2">
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_1.jpg" rel="nofollow" data-lightbox="casa_amr" title="adancime fundatie"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_1s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_2.jpg" rel="nofollow" data-lightbox="casa_amr" title="turnare fundatie"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_2s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li overlay_gallery_li_fix"><a href="assets/gallery_amr_house_3.jpg" rel="nofollow" data-lightbox="casa_amr" title="armare elevatie"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_3s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_4.jpg" rel="nofollow" data-lightbox="casa_amr" title="fier elevatie"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_4s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_5.jpg" rel="nofollow" data-lightbox="casa_amr" title="turnare elevatie"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_5s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li overlay_gallery_li_fix"><a href="assets/gallery_amr_house_6.jpg" rel="nofollow" data-lightbox="casa_amr" title="compactare pamant fundatie"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_6s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_7.jpg" rel="nofollow" data-lightbox="casa_amr" title="hidroizolatie fundatie"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_7s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_8.jpg" rel="nofollow" data-lightbox="casa_amr" title="hidroizolatie stalpi"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_8s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li overlay_gallery_li_fix"><a href="assets/gallery_amr_house_9.jpg" rel="nofollow" data-lightbox="casa_amr" title="fier placa"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_9s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_10.jpg" rel="nofollow" data-lightbox="casa_amr" title="fier placa"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_10s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_11.jpg" rel="nofollow" data-lightbox="casa_amr" title="fier scara"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_11s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li overlay_gallery_li_fix"><a href="assets/gallery_amr_house_12.jpg" rel="nofollow" data-lightbox="casa_amr" title="zidarie mansarda"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_12s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_13.jpg" rel="nofollow" data-lightbox="casa_amr" title="folie acoperis"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_13s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_14.jpg" rel="nofollow" data-lightbox="casa_amr" title="vedere din spate"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_14s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li overlay_gallery_li_fix"><a href="assets/gallery_amr_house_15.jpg" rel="nofollow" data-lightbox="casa_amr" title="gata la rosu"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_15s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_16.jpg" rel="nofollow" data-lightbox="casa_amr" title="termosistem fata"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_16s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_17.jpg" rel="nofollow" data-lightbox="casa_amr" title="termosistem spate"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_17s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li overlay_gallery_li_fix"><a href="assets/gallery_amr_house_18.jpg" rel="nofollow" data-lightbox="casa_amr" title="polistiren 10 cm"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_18s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_19.jpg" rel="nofollow" data-lightbox="casa_amr" title="polistiren extrudat sub pardoseala"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_19s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li"><a href="assets/gallery_amr_house_20.jpg" rel="nofollow" data-lightbox="casa_amr" title="izolatie din vata acoperis"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_20s.jpg" width="126" height="126" alt=""/></a></li>
	        <li class="float_l overlay_gallery_li overlay_gallery_li_fix"><a href="assets/gallery_amr_house_21.jpg" rel="nofollow" data-lightbox="casa_amr" title="fatada - structurata STO"><img class="frame_6_img opacity0 to02l" src="assets/no-img.gif" data-src="assets/gallery_amr_house_21s.jpg" width="126" height="126" alt=""/></a></li>
	      </ul>
      </div>
      
      <div class="overlay_subtitle">Harta Casa AMR - zona Freidorf, Timisoara</div>
      <a href="https://maps.google.com/maps?ll=45.7246167,21.18531675&spn=0.000485,0.001145&z=17" rel="nofollow" target="_blank"><div class="overlay_map"></div></a>
      
    </div>
  </div>
</div>

<script>(function() {var f=document.createElement('script');f.type='text/javascript';f.async=true;f.src='http://assets.casasuperba.ro/main.06121301.min.js';var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(f, s);})();(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-15898892-19', 'casasuperba.ro');ga('send', 'pageview');
</script>

</body>
</html>