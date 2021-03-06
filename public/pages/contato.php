<h2>Contact</h2>
<br>
<?php
/*uma forma diferente de chamar o php  

O PHP também permite a tag curta echo <?= cujo uso é desencorajado pois essa opção está disponível somente quando habilitada na diretiva short_open_tag no arquivo de configuração php.ini, ou quando o PHP tiver sido compilado com a opção --enable-short-tags ).*/

?>

<?=get('message')?>

<form action="pages/forms/contato.php" method="POST" role="form">

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Your name">
    </div>


    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Your email">
    </div>


    <div class="form-group">
        <label for="">Subject</label>
        <input type="text" class="form-control" name="subject" placeholder="Subject">
    </div>


    <div class="form-group">
        <label for="">Message</label>
        <textarea name="message" cols="30" rows="6" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>