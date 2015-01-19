SHELL := /bin/bash
PATH  := node_modules/.bin:make/bin:$(PATH)

hsimp_jquery	:=		node_modules/how-secure-is-my-password--jquery/build

.PHONY: build watch

build: how-secure-is-my-password/hsimp.wordpress.min.js how-secure-is-my-password/hsimp.wordpress.css
watch: build .watch.ref

.watch.ref: src/hsimp.wordpress.js how-secure-is-my-password/how-secure-is-my-password.php
	touch $@
	@ chrome-canary-cli reload

how-secure-is-my-password/hsimp.wordpress.min.js: src/hsimp.wordpress.js
	uglifyjs $(hsimp_jquery)/hsimp.jquery.min.js src/hsimp.wordpress.js -m -c > $@

how-secure-is-my-password/hsimp.wordpress.css:
	cp $(hsimp_jquery)/hsimp.jquery.css $@
