const football = [ 
    {club: "SCB", joueur:"SANTELLI", but:2},
    {club: "SCB", joueur:"MAGRI", but:1},
    {club: "HAC", joueur:"KITALA", but:3},
    {club: "SCB", joueur:"ROBIC", but:3},
    {club: "BORDEAUX", joueur:"MAJA", but:4}
];

const scbPlayer = football.filter(e => e.club == "SCB").map(e => e.but + 1).reduce((sum, e) => sum+e);

console.log(scbPlayer);