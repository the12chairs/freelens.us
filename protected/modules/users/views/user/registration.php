<h1>Registration</h1>


<?=CHtml::form(); ?>

<?=CHtml::errorSummary($form); ?><br>

<table id="form2" border="0" width="400" cellpadding="10" cellspacing="10">
    <tr>

        <td width="150"><?=CHtml::activeLabel($form, 'login'); ?></td>
        <td><?=CHtml::activeTextField($form, 'login') ?></td>
    </tr>
    <tr>

        <td><?=CHtml::activeLabel($form, 'pass'); ?></td>
        <td><?=CHtml::activePasswordField($form, 'pass') ?></td>
    </tr>
    <tr>

        <td><?php $this->widget('CCaptcha', array('buttonLabel' => '<br>[New code]')); ?></td>
        <td><?=CHtml::activeTextField($form,'verifyCode'); ?></td>
    </tr>
    <tr>
        <td></td>

        <td><?=CHtml::submitButton('Sign up', array('id' => "submit")); ?></td>
    </tr>
</table>

<?=CHtml::endForm(); ?>