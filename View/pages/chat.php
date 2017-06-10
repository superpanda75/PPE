<div id="conversation" class="conversation" style="color: black">
    <table id="table_message">
        <?php
        while($don = $message->fetch())
        {
            // Ligne affiché ici
        }
        ?>
    </table>
</div>
<br>
<br>
<br>
<br>
<form id="sendMessage" method="post">
    <select id="des" name="des">
        <?php

        foreach($contacts as $index){
            echo "<option value='".$index->getId()."'>".$index->getNom()."</option>";
        }
        ?>
    </select>
    <label for="message">Votre message</label>
    <input id="msg" name="msg" type="text">
    <input id="envoyer" class="envoyer" name="submit" value="envoyer"  type="submit">
</form>
<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<script src="<?=BASE_URL?>/View/js/jquery-3.2.0.min.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.backtotop.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.mobilemenu.js"></script>
<script>
    var conteneur = document.getElementById('conversation')
    $("#envoyer").click(function (e) {
        msg = document.getElementById('msg').value;
        des = document.getElementById('des').value;
        $.ajax({
            type: 'POST',
            url: '<?= BASE_URL ?>/chatController',
            data: {
                msg: msg,
                des : des
            }
        }).done(function () {
            console.log(conteneur);
            conteneur.innerHTML = conteneur.innerHTML + msg
        }).fail(function (error) {
            alert(error);
        });
    });
</script>