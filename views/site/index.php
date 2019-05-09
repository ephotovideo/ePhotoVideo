<?php

/* @var $this yii\web\View */

$this->title = 'ePhotoVideo';
?>

    
    <div class="slider-area">
        <div class="zigzag-bottom"></div>
            
        
            <div class="carousel-inner" role="listbox">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                           <div class="slide-text-wrapper">
                              <div class="slide-text">
                                  <div class="on-wich-you-side">
                                    <div class="left-block">
                                          <div class="row">
                                             <div class="slide-content" id="animate-side"> 
                                                 <div class="marg-text">
                                                     <h2>Шукаю фотографа\відеографа</h2>
                                                     <p>У вас у житті відбувається якась важлива подія, а "зафіксувати спогад" нема кому? Шукай тут!!! </p>
                                                     <?php if(Yii::$app->user->isGuest): ?>
                                                     <a href="/login" class="readmore">Шукати</a>
                                                     <?php else: ?>
                                                     <a href="/site/raiting" class="readmore">Шукати</a>
                                                     <?php endif; ?>
                                                 </div>
                                               </div>
                                          </div>
                                     </div>
                                     <div class="right-block">
                                            <div class="row">
                                               <div class="slide-content-right" id="animate-side">
                                                   <div class="marg-text-left marg-text">
                                                    <h2>Шукаю вакансії зйомок</h2>
                                                   <p>Якщо ви любите фотографувати, ви любите знімати відео, у вас є відповідна апаратура, і ще  хочеш підзаробити? Тобі сюди!</p>
                                                   
                                                   <?php if(Yii::$app->user->isGuest): ?>
                                                     <a href="/login" class="readmore">Шукати</a>
                                                     <?php else: ?>
                                                     <a href="site/vacancy" class="readmore">Шукати</a>
                                                     <?php endif; ?>
                                                </div>
                                               </div>
                                            </div>
                                       </div>
                                    </div>
                                   </div> 
                                </div>
                            </div>
                        </div>
                </div>               
            </div>

        </div>        
    </div>