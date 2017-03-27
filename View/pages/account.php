<?php #var_dump($pendingFormations)
echo "<pre>";
var_dump($formatedDatesPFD);
echo "</pre>";?>
<div class="wrapper row2">
    <main class="hoc container clear">
        <div class="sidebar one_quarter first">
            <h6>Mon Compte</h6>
            <nav class="sdb_holder">
                <ul>
                    <li><a href="#">Mon Profil</a>
                    <li><a href="#">Mes formations</a>
                        <ul>
                            <li class="tablinks" id="defaultOpen" onclick="openCity(event, 'London')"><a href="#">formations en attente</a></li>
                            <li class="tablinks" id="defaultOpen" onclick="openCity(event, 'Paris')"><a href="#">formations validées</a></li>
                            <li><a href="#">formations effectuées</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Contacts</a>
                        <ul>
                            <li><a href="#">Navigation - Level 2</a></li>
                            <li><a href="#">Navigation - Level 2</a>
                                <ul>
                                    <li><a href="#">Navigation - Level 3</a></li>
                                    <li><a href="#">Navigation - Level 3</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Navigation - Level 1</a></li>
                </ul>
            </nav>
            <div class="sdb_holder">
                <h6>Lorem ipsum dolor</h6>
                <address>
                    Full Name<br>
                    Address Line 1<br>
                    Address Line 2<br>
                    Town/City<br>
                    Postcode/Zip<br>
                    <br>
                    Tel: xxxx xxxx xxxxxx<br>
                    Email: <a href="#">contact@domain.com</a>
                </address>
            </div>
        </div>
        <div id="London" class="tabcontent">
            <div class="content three_quarter">
                <h1>&lt;h1&gt; to &lt;h6&gt; - Headline Colour and Size Are All The Same</h1>
                <img class="imgr borderedbox inspace-5" src="../images/demo/imgr.gif" alt="">
                <p>Aliquatjusto quisque nam consequat doloreet vest orna partur scetur portortis nam. Metadipiscing eget facilis elit sagittis felisi eger id justo maurisus convallicitur.</p>
                <p>Dapiensociis <a href="#">temper donec auctortortis cumsan</a> et curabitur condis lorem loborttis leo. Ipsumcommodo libero nunc at in velis tincidunt pellentum tincidunt vel lorem.</p>
                <img class="imgl borderedbox inspace-5" src="../images/demo/imgl.gif" alt="">
                <p>This is a W3C compliant free website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. For full terms of use of this template please read our <a href="http://www.os-templates.com/template-terms">website template licence</a>.</p>
                <p>You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files. For more website templates visit our <a href="http://www.os-templates.com/">free website templates</a> section.</p>
                <p>Portortornec condimenterdum eget consectetuer condis consequam pretium pellus sed mauris enim. Puruselit mauris nulla hendimentesque elit semper nam a sapien urna sempus.</p>
                <h1>Table(s)</h1>
                <div class="scrollable">
                    <table>
                        <thead>
                        <tr>
                            <th class="center">Formation</th>
                            <th class="center">Référent</th>
                            <th class="center">date demande</th>
                            <th class="center">Annuler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i=0;

                        foreach($formatedDatesPFD as $key )

                            echo"
                                <tr id=".$key['id_participation'].">
                                    <td class='center'>".$key['titre']."</td>
                                    <td class='center'>".$key['nom']." ".$key['prenom']."</td>
                                    <td class='center'>".$key['date_demande']."</a></td>
                                    <td class='del center'
                                        id='".$key['id_participation']."'
                                        document.getElementById('id01')>
                                        <span id='myBtn' style='cursor:pointer; color:#F08714;'>X</span>
                                    </td>
                                </tr>
                                ";

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="content three_quarter">
        <div id="Paris" class="tabcontent">
            <div id="comments">
                <h2>Comments</h2>
                <ul>
                    <li>
                        <article>
                            <header>
                                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                                <address>
                                    By <a href="#">A Name</a>
                                </address>
                                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                            </header>
                            <div class="comcont">
                                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                            </div>
                        </article>
                    </li>
                    <li>
                        <article>
                            <header>
                                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                                <address>
                                    By <a href="#">A Name</a>
                                </address>
                                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                            </header>
                            <div class="comcont">
                                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                            </div>
                        </article>
                    </li>
                    <li>
                        <article>
                            <header>
                                <figure class="avatar"><img src="../images/demo/avatar.png" alt=""></figure>
                                <address>
                                    By <a href="#">A Name</a>
                                </address>
                                <time datetime="2045-04-06T08:15+00:00">Friday, 6<sup>th</sup> April 2045 @08:15:00</time>
                            </header>
                            <div class="comcont">
                                <p>This is an example of a comment made on a post. You can either edit the comment, delete the comment or reply to the comment. Use this as a place to respond to the post or to share what you are thinking.</p>
                            </div>
                        </article>
                    </li>
                </ul>
                <h2>Write A Comment</h2>
                <form action="#" method="post">
                    <div class="one_third first">
                        <label for="name">Name <span>*</span></label>
                        <input type="text" name="name" id="name" value="" size="22" required>
                    </div>
                    <div class="one_third">
                        <label for="email">Mail <span>*</span></label>
                        <input type="email" name="email" id="email" value="" size="22" required>
                    </div>
                    <div class="one_third">
                        <label for="url">Website</label>
                        <input type="url" name="url" id="url" value="" size="22">
                    </div>
                    <div class="block clear">
                        <label for="comment">Your Comment</label>
                        <textarea name="comment" id="comment" cols="25" rows="10"></textarea>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Submit Form">
                        &nbsp;
                        <input type="reset" name="reset" value="Reset Form">
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>
    </main>
</div>

<div id="myModal" class="modal">



    <!--FENETRE ALERTE -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
            <h2>Annulation de damande de formation</h2>
        </div>
        <div class="modal-body">
            <p>Vous êtes sur le point d'annuler la demande à cette formation.</p>
            <p>En êtes-vous sûr ?</p>

        <div>
            <ul class="nospace inline pushright center">
                <li class="check" id="true"><a class="btn inverse">Oui</a></li>
                <li class="checkn" id="false"><a class="btn inverse">Non</a></li>
            </ul>
        </div>
            <br>
        </div>
        <div class="modal-footer">
            <h3>Modal Footer</h3>
        </div>
    </div>
</div>

<!-- JAVASCRIPTS -->
<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<script src="<?=BASE_URL?>/View/js/jquery.backtotop.js"></script>
<script src="<?=BASE_URL?>/View/js/jquery.mobilemenu.js"></script>
<script src="<?=BASE_URL?>/View/js/deleteFormations.js"></script>