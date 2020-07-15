<?php

    get_header();
?>
    <main>
        <div class="container">
            <article class="project">
                <div class="left-col"></div>
                <div class="right-col">
                    <div class="title">
                        <h3 class="category-project">
                            Здоров’я
                        </h3>
                        <h2 class="title-project">Lorem Ipsum is simply dummy text of the printing and typesetting industry</h2>
                        <time class="date">
                            24 травня 2020
                        </time>
                    </div>
                    <div class="data">
                        <div class="result">
                            <ul>
                                <li>
                                    <span class="text">Потрiбно зiбрати</span>
                                    <span class="money">59 000 грн</span>
                                </li>
                                <li>
                                    <span class="text">Зібрано</span>
                                    <span class="money">49 000 грн</span>
                                </li>
                                <li>
                                    <span class="text">Залишилось</span>
                                    <span class="money">10 000 грн</span>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="progress-bar" data-percent="75">
                                <div class="background"></div>
                                <div class="rotate"></div>
                                <div class="left"></div>
                                <div class="right"></div>
                                <div class="percent">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn">Допомогти</button>
                        </div>
                    </div>
                    <p class="description">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                    </p>
                    <div class="info">
                        <div class="info-links">
                            <ul class="info-list">
                                <li>
                                    <button type="button" class="btn btn-category" data-target="donors-block">
                                        Донори
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-category" data-target="blog-block">
                                        Блог
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-category" data-target="documents-block">
                                        Документи
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-block">
                            <div>
                                <time class="date">25.05.2020</time>
                                <h4>Якась там назва статті</h4>
                            </div>
                            <div>
                                <time class="date">25.05.2020</time>
                                <h4>Якась там назва статті</h4>
                            </div>
                            <div>
                                <time class="date">25.05.2020</time>
                                <h4>Якась там назва статті</h4>
                            </div>
                            <div>
                                <time class="date">25.05.2020</time>
                                <h4>Якась там назва статті</h4>
                            </div>
                        </div>
                        <div class="donors-block">
                            <div>
                                <div>
                                    <time class="date">25.05.2020</time>
                                    <h4>Анонімна допомога</h4>
                                </div>
                                <span class="donors-money">+500.00 грн</span>
                            </div>
                            <div>
                                <div>
                                    <time class="date">25.05.2020</time>
                                    <h4>Анонімна допомога</h4>
                                </div>
                                <span class="donors-money">+500.00 грн</span>
                            </div>
                            <div>
                                <div>
                                    <time class="date">25.05.2020</time>
                                    <h4>Анонімна допомога</h4>
                                </div>
                                <span class="donors-money">+500.00 грн</span>
                            </div>
                        </div>
                        <div class="documents-block">
                            <div>
                                <h4>Якась там назва статті</h4>
                                <a href="#">Переглянути</a>
                            </div>
                            <div>
                                <h4>Якась там назва статті</h4>
                                <a href="#">Переглянути</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </main>


<?php
include 'custom_plugins/tape.php';

get_footer();
