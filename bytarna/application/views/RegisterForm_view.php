<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('index.php/RegisterForm', $attributes); ?>

<p>
  <label for="username">Användarnamn <span class="required">*</span></label>
  <?php echo form_error('username'); ?>
  <br />
  <input id="username" type="text" name="username" maxlength="255" value="<?php echo set_value('username'); ?>"  />
</p>

<p>
  <label for="firstname">Förnamn <span class="required">*</span></label>
  <?php echo form_error('firstname'); ?>
  <br />
  <input id="firstname" type="text" name="firstname" maxlength="255" value="<?php echo set_value('firstname'); ?>"  />
</p>

<p>
  <label for="lastname">Efternamn <span class="required">*</span></label>
  <?php echo form_error('lastname'); ?>
  <br />
  <input id="lastname" type="text" name="lastname" maxlength="255" value="<?php echo set_value('lastname'); ?>"  />
</p>

<p>
  <label for="city">Stad</label>
  <?php echo form_error('stad'); ?>
  <br />
  <input id="city" type="text" name="city" maxlength="255" value="<?php echo set_value('stad'); ?>"  />
</p>

<p>
  <label for="country">Land</label>
  <?php echo form_error('country'); ?>
        
  <?php // Change the values in this array to populate your dropdown as required ?>
  <?php $options = array(
                          ''  => 'Välj land',
                          'sweden'   => 'Sverige',
                          'norway'   => 'Norge',
                          'denmark'  => 'Danmark',
                          'finland'  => 'Finland'
                                                   ); ?>

        <br /><?php echo form_dropdown('country', $options, set_value('country'))?>
</p>                                             
                        
<p>
        <label for="zip">Postnr</label>
	<?php echo form_error('zip'); ?>
	<br />
	<input id="zip" type="text" name="zip"  value="<?php echo set_value('zip'); ?>"  />
<p>
        <label for="phone">Telefon</label>
        <?php echo form_error('phone'); ?>
        <br /><input id="phone" type="text" name="phone"  value="<?php echo set_value('phone'); ?>"  />
</p>

<p>
        <label for="email">Email <span class="required">*</span></label>
        <?php echo form_error('email'); ?>
        <br /><input id="email" type="text" name="email"  value="<?php echo set_value('email'); ?>"  />
</p>

<p>
        <label for="password">Lösenord <span class="required">*</span></label>
        <?php echo form_error('password'); ?>
        <br /><input id="password" type="password" name="password" maxlength="255" value="<?php echo set_value('password'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
