#!/bin/bash

from_dir='vendor/twbs/bootstrap/dist'
to_dir='public'
css_files=('bootstrap.css bootstrap.min.css bootstrap.css.map bootstrap.min.css.map')

for file in $css_files
do
    cp "$from_dir/css/$file" "$to_dir/css/$file"
done

font_files=('glyphicons-halflings-regular.eot glyphicons-halflings-regular.svg glyphicons-halflings-regular.ttf glyphicons-halflings-regular.woff glyphicons-halflings-regular.woff2')

for file in $font_files
do
    cp "$from_dir/fonts/$file" "$to_dir/fonts/$file"
done

js_files=('bootstrap.js bootstrap.min.js')

for file in $js_files
do
    cp "$from_dir/js/$file" "$to_dir/js/$file"
done
