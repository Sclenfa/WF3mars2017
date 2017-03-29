var myNumber = 45;

// Égalité simple: vérifier la valeur de la variable
console.log(myNumber==45); // True
console.log(myNumber=="45"); // True

// Inégalité simple: vérifié la valeur de la variable
console.log(myNumber!=45); // False
console.log(myNumber!="45"); // False
console.log(myNumber!=12); // True

// Égalité stricte: vérifié la valeur ET le type de la variable
console.log(myNumber===45); // True
console.log(myNumber==="45"); // False

// Inégalité stricte
console.log(myNumber!==45); // False
console.log(myNumber!=="45"); // True

// Supérieur / inférieur
console.log(myNumber>46); // False
console.log(myNumber<46); // True

// Supérieur ou égale / inférieur ou égale
console.log(myNumber>=12); // True
console.log(myNumber<=12); // False
console.log(myNumber>=45); // True
console.log(myNumber<=45); // True