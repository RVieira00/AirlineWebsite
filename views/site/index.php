<?php
use app\models\Trajeto;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';

$aeroportos = Trajeto::getAllAeroportosArray();
?>
<div class="site-index">
        <section id="carousel">
            <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="10000">
                        <div style="background: url('images/hero-image.jpg') center" class="d-block w-100 carousel-img" >
                            <div class="container carousel-caption d-none d-md-block">
                                <h1 class="display-4">Voa mais alto</h1>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut dolorum explicabo, id nulla omnis placeat suscipit. A atque consequatur debitis delectus dolore ex magni modi mollitia, nihil quam quasi sunt!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-interval="2000">
                        <div style="background: url('images/entertenimento.jpg') center" class="d-block w-100 carousel-img">
                            <div class="container carousel-caption d-none d-md-block">
                                <h1 class="display-4">Enternimento a bordo</h1>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut dolorum explicabo, id nulla omnis placeat suscipit. A atque consequatur debitis delectus dolore ex magni modi mollitia, nihil quam quasi sunt!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-interval="3000">
                        <div style="background: url('images/serviçosabordo.jpg') center" class="d-block w-100 carousel-img">

                            <div class="container carousel-caption d-none d-md-block">
                                <h1 class="display-4">Serviços a bordo</h1>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut dolorum explicabo, id nulla omnis placeat suscipit. A atque consequatur debitis delectus dolore ex magni modi mollitia, nihil quam quasi sunt!</p>
                            </div>

                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>

    <div class="container">
        <h1 class="animate__lightSpeedInLeft">Here to next?</h1>
        <hr>
        <br>
        <span id="focus-route-section"></span>
        <section class="container" id="route-container">
            <form id="choose-route-form" onsubmit="return false;">
                <div class="row">
                    <div class="option-route col-sm">
                        <label for="origem"><h4>Origem</h4></label>
                        <br>
                        <select id="origem" name="origem" class="route-opts">
                            <?php
                            for($i = 1; $i < count($aeroportos) + 1; $i++){
                                ?>
                                <option value="<?php echo $aeroportos[$i]?>"><?php echo $aeroportos[$i] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div style="margin: auto; font-size: 48px;">
                        <i class="fas fa-arrow-circle-right"></i>
                    </div>
                    <div class="option-route col-sm">
                        <label for="destino"><h4>Destino</h4></label>
                        <br>
                        <select id="destino" name="destino" class="route-opts">
                            <?php
                            for($i = 1; $i < count($aeroportos) + 1; $i++){
                                ?>
                                <option value="<?php echo $aeroportos[$i]?>"><?php echo $aeroportos[$i] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm"style="text-align: center">
                        <label><h4>Data</h4></label><br>
                        <input type="date" id="date">
                        <br>
                        <button class="btn btn-lg btn-primary m-3" id="index_pesquisar_voos">Pesquisar</button>
                    </div>
                </div>
            </form>

        </section>
        <section id="img-galery" >
            <h1 style="text-align: center">Discover the world</h1>
            <br>
            <hr>
            <br>
            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-12 d-flex justify-content-center mb-5">

                    <button type="button" class="btn btn-outline-dark waves-effect filter m-1" data-rel="all">All</button>
                    <button type="button" class="btn btn-outline-dark waves-effect filter m-1" data-rel="1">Mountains</button>
                    <button type="button" class="btn btn-outline-dark waves-effect filter m-1" data-rel="2">Sea</button>

                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->

            <!-- Grid row -->
            <div class="gallery" id="gallery">

                <!-- Grid column -->
                <div class="mb-3 pics animation all 2">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(73).jpg" alt="Card image cap">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="mb-3 pics animation all 1">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain1.jpg" alt="Card image cap">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="mb-3 pics animation all 1">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain2.jpg" alt="Card image cap">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="mb-3 pics animation all 2">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg" alt="Card image cap">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="mb-3 pics animation all 2">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg" alt="Card image cap">
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="mb-3 pics animation all 1">
                    <img class="img-fluid" src="https://mdbootstrap.com/img/Photos/Vertical/mountain3.jpg" alt="Card image cap">
                </div>
                <!-- Grid column -->

            </div>
            <!-- Grid row -->
        </section>
    </div>
</div>

