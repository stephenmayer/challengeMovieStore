Rental Record for {{ name }}
{{# getRentals }}
    {{ movie.name }}              {{ amountDue }}
{{/ getRentals}}
Amount owed is {{ getAmount }}
You earned {{ getPoints }} frequent renter points