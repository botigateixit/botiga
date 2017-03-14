for i in 2017/*
do
echo "comparant $i"
diff "$i" ../gestio/"$i"
done

