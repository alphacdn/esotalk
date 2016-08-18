<?php
  // Copyright 2011 Toby Zerner, Simon Zerner
  // This file is part of esoTalk. Please see the included license file for usage information.
  
  if (!defined("IN_ESOTALK")) exit;
  
  /**
   * Default master view. Displays a HTML template with a header and footer.
   *
   * @package esoTalk
   */
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='<?php echo T("charset", "utf-8"); ?>'>
  <title><?php echo sanitizeHTML($data["pageTitle"]); ?></title>
  <?php echo $data["head"]; ?>
  <style>::-webkit-scrollbar-track {background-color: transparent;}::-webkit-scrollbar {width: 12px;background: #efefef;}::-webkit-scrollbar-thumb {background-color: #999;}</style>
</head>

<body class='<?php echo $data["bodyClass"]; ?>'>
<?php $this->trigger("pageStart"); ?>

<nav id="navbar" class="navbar navbar-default navbar-static-top">
  <div id="navbar-center">
    <div class="navbar-header">
      <a class="navbar-brand" href="./"><img src="//alphacdn.com/assets/img/logo-white.svg"></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="//dash.alpha.uf-web.de" title="Dashboard">Dashboard <i class="fa fa-database fa-fw"></i></a></li>
        <li class="active">
          <a href="./" target="_blank" title="Forum">Community <i class="fa fa-users fa-fw"></i></a>
        </li>
        <li>
          <a href="//support.alphacdn.com" target="_blank" title="Hilfe">Hilfe <i class="fa fa-comments fa-fw"></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div id='messages'>
  <?php foreach ($data["messages"] as $message): ?>
    <div class='messageWrapper'>
      <div class='message <?php echo $message["className"]; ?>'
           data-id='<?php echo @$message["id"]; ?>'><?php echo $message["message"]; ?></div>
    </div>
  <?php endforeach; ?>
</div>

<div id='wrapper'>
  
  <!-- HEADER -->
  <div id='hdr'>
    <div id='hdr-content'>
      
      <div id='hdr-inner'>
        
        <?php if ($data["backButton"]): ?>
          <a href='<?php echo $data["backButton"]["url"]; ?>' id='backButton'
             title='<?php echo T("Back to {$data["backButton"]["type"]}"); ?>'><i class="fa fa-chevron-left"></i></a>
        <?php endif; ?>
        
        <h1 id='forumTitle'><a href='<?php echo URL(""); ?>'><?php echo $data["forumTitle"]; ?></a></h1>
        
        <ul id='mainMenu' class='menu'>
          <?php if (!empty($data["mainMenuItems"])) echo $data["mainMenuItems"]; ?>
        </ul>
        
        <ul id='userMenu' class='menu'>
          <?php echo $data["userMenuItems"]; ?>
          <li><a href='<?php echo URL("conversation/start"); ?>'
                 class='link-newConversation button'><?php echo T("New Conversation"); ?></a></li>
        </ul>
      </div>
    </div>
  </div>
  
  <!-- BODY -->
  <div id='body'>
    <div id='body-content'>
      <?php echo $data["content"]; ?>
    </div>
  </div>
  
  <!-- FOOTER -->
  <div id='ftr'>
    <div id='ftr-content'>
      <ul class='menu'>
        <li id='goToTop'><a href='#'><?php echo T("Go to top"); ?></a></li>
        <?php echo $data["metaMenuItems"]; ?>
        <?php if (!empty($data["statisticsMenuItems"])) echo $data["statisticsMenuItems"]; ?>
      </ul>
    </div>
  </div>
  <?php $this->trigger("pageEnd"); ?>
  
</div>

</body>
</html>
