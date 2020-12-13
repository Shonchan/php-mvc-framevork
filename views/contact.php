<?php
/** @var $this \App\View  */
/** @var $model \App\models\ContactForm  */

use shonchan\phpmvc\form\Form;
use shonchan\phpmvc\form\TextAreaField;

$this->title='Contact';
?>
<h1>Contact us</h1>

<?php $form = Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'subject') ?>
    <?php echo $form->field($model, 'email') ?>
    <?php echo new TextAreaField($model, 'body') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php $form->end() ?>
