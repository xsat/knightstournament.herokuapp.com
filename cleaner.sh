#!/bin/bash

directories=('apps/common/cache/models/ apps/frontend/cache/views/ apps/frontend/cache/models/ apps/server/cache/models/')
content=$'*\n!.gitignore'

for dir in $directories
do
    rm -r $dir
    mkdir $dir
    chmod 777 $dir
    echo "$content" > "$dir.gitignore"
done
