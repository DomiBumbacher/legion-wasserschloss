for file in "./"*
do
    [[ $file = "./build" ]] && continue
    cp -r "$file" "build"
done