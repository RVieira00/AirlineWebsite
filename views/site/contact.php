<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jumbotron jumbotron-fluid" id="hero-section">

</div>
<div class="site-contact container text-center">
    <h1 class="page-title"><?= Html::encode($this->title) ?></h1>
    <hr>
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>



        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>
        <br>
        <br>
        <div class="row text-center m-auto">


                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name',[
                        'template' => "<h3 class='form-lable'>{label}</h3><br><div>{input}</div>\n{hint}\n{error}"
                    ])->textInput(['autofocus' => true]) ?>
                    <hr>
                    <?= $form->field($model, 'email',[
                        'template' => "<h3 class='form-lable'>{label}</h3><br><div>{input}</div>\n{hint}\n{error}"
                    ]) ?>
                    <hr>
                    <?= $form->field($model, 'subject',[
                        'template' => "<h3 class='form-lable'>{label}</h3><br><div>{input}</div>\n{hint}\n{error}"
                    ]) ?>
                     <hr>
                    <?= $form->field($model, 'body',[
                        'template' => "<h3class='form-lable'>{label}</h3><br><div>{input}</div>\n{hint}\n{error}"
                    ])->textarea(['rows' => 6]) ?>
                    <hr>
                    <?= $form->field($model, 'verifyCode',[
                        'template' => "<h6 class='form-lable'>{label}</h6><br><div>{input}</div>\n{hint}\n{error}"
                    ])->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col">{image}{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
                <br><br>

        </div>

    <?php endif; ?>
</div>
