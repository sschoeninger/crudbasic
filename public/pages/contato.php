<h2>pagina de contato</h2>
<br>
<?php
/*uma forma diferente de chamar o php  

O PHP também permite a tag curta echo <?= cujo uso é desencorajado pois essa opção está disponível somente quando habilitada na diretiva short_open_tag no arquivo de configuração php.ini, ou quando o PHP tiver sido compilado com a opção --enable-short-tags ).*/

?>

<?=get('message')?>

<form action="pages/forms/contato.php" method="POST" role="form">

    <div class="form-group">
        <label for="">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Digite seu nome">
    </div>


    <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Digite seu email">
    </div>


    <div class="form-group">
        <label for="">Assunto</label>
        <input type="text" class="form-control" name="subject" placeholder="Digite o assunto">
    </div>


    <div class="form-group">
        <label for="">mensagem</label>
        <textarea name="message" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>