<?php use_helper('I18n'); ?>
<div id="ctr" align="center">
  <div class="login">
    <div class="login-form">
      <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
        <img alt="Login" src="/sfAdminDashPlugin/images/login.gif" />
        <div class="form-block">
          <?php echo $form->renderGlobalErrors() ?>
          <?php echo $form['_csrf_token']->render(); ?>
          <div class="inputlabel"><?php echo $form['username']->renderLabel(__('Username', array(), 'sf_admin_dash')) ?>:</div>
          <div>
            <?php echo $form['username']->renderError() ?>
            <?php echo $form['username']->render(array('class' => 'inputbox')); ?>
          </div>
          <div class="inputlabel"><?php echo $form['password']->renderLabel(__('Password', array(), 'sf_admin_dash')) ?>:</div>
          <div>
            <?php echo $form['password']->renderError() ?>
            <?php echo $form['password']->render(array('class' => 'inputbox')); ?>
          </div>
          <div class="inputlabel">
            <?php echo $form['remember']->renderLabel(__('Remember?', array(), 'sf_admin_dash')) ?>
            <?php echo $form['remember']->render(array('class' => 'inputcheck')); ?>
          </div>
          <div align="left"><input type="submit" name="submit" class="button clr" value="Login" /></div>
        </div>
      </form>
    </div>
    <div class="login-text">
      <div class="ctr"><img alt="Security" src="/sfAdminDashPlugin/images/login_security.png" /></div>
      <p><?php echo __('Welcome to', array(), 'sf_admin_dash'); ?> <?php echo sfAdminDash::getProperty('site') ?></p>
      <p><?php echo __('Use a valid username and password to gain access to the administration console.', array(), 'sf_admin_dash'); ?></p>
    </div>

    <div class="clr"></div>
  </div>
</div>
