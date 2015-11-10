<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <title>testing</title>
  <meta name="author" content="web-capitan">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="/css/style.css">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script type="text/javascript" src="/js/jquery-ui-1.10.3.min.js"></script>
  <script src="/js/art.js"></script>
</head> 
<body>
  <header>
    <div class="content">
      <div class="logo"><a href=""><img src="/images/logo.png" alt=""></a></div>
      <nav>
        <ul>
          <li><a href="">Happy TESTERS</a></li>
          <li><a href="">Status</a></li>
          <li><a href="">Invite Friends</a></li>
          <li><a href="">Today's Survey</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <main>
    <div class="content">
     <?php if($step!='step_3'):?>
     
     
      <div class="left-colum">
      <h1><b>Getting your</b> AWESOME PRIZE is easy!</h1>
      <ul class="nice-list">
        <li><span>1</span>Sign up and complete a survey</li>
        <li><span>2</span>Tell us more about yourself</li>
        <li><span>3</span>Get an awesome prize!</li>
      </ul>
      </div>
      <div class="r-colum">
          <div class="last-time">
            <h3>Time remaining to complete your tasks</h3>
            <h2><b data-time="<?=$time;?>" id="timer"></b> seconds</h2>
          </div>
      </div>
     <?php endif;?> 
     <?=$this->load->view($step,array(),true);?>


    </div>
  </main>
  <footer>
    <p>© Copyright Fancy Survey 2013. </p>
  </footer>
</body>