let sequence = [1, 1, 2, 3, 5, 8, 13];
let pair = [];
let impaire = [];

function exec(sequence)
{
    for(let i = 0; i < sequence.length; i++)
    {
        console.log(sequence[i], isPair(sequence[i]));
        sequence[i] = sequence[i] * 2;
        if(sequence[i] % 2 == 0){
            pair.push(sequence[i]);
        }
        else{
            impaire.push(sequence[i]);
        }
    }
}

function add(seq){
    let somme = 0;
    for(let i ; i < seq.length; i++)
{
    somme = somme + seq[i];
}
return somme

}

function isPair(number){
    if(number % 2 == 0){
        return " est pair";
    }
    else{
        return " est impair";
    }
}

exec(sequence);
console.log("Liste des nombres pairs : ", pair);
console.log("Liste des nombres impairs : ", impaire);