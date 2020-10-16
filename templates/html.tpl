<h1>Rental Record for <em>{{ name }}</em></h1>
<ul>
    {{# getRentals }}
    <li>{{ movie.name }}  - {{ amountDue }}</li>
    {{/ getRentals}}
</ul>
<p>Amount owed is <em>{{ getAmount }}</em></p>
<p>You earned <em>{{ getPoints }}</em> frequent renter points</p>
