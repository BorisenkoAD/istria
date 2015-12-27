перевод сайта на ООП - попытка 2

www.istria-spb.ru/index.php?option=main

точка входа index.php
создается main.class
	в нем прописывается главная страница сайта
	на главной странице - 3 раздела, т.е. будет 3 вызова метода get_content(): 	get_content_1(); get_content_2(); get_content_3().
	чтобы одно и тоже сто раз не писать создать в core.class метод get_blueLine() и вызывать его по мере необходимости.

в абстрактном классе core.class будет определен метод get_body()
он, в свою очередь, будет состоять из методов
get_header() - header.class 
get_nav() - menu.class
get_block()
	get_content() - берем из класса
get_footer()
get_footer_nav()

поскольку каждый раздел привязывается к пункту меню (кроме главной) весь текст будет привязан к id меню.
там будет свой: 
				get_header()
					тег title/decsription
				get_content_n()
					картинки/текст
				
