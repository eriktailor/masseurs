# Saeng Masseurs

This is the rebuilded project of Saeng Lányok back in 2022. 
It shares the database with the [booking](https://github.com/stewart89/booking-10) project.

## Build

To start watching sass & js files, run:

```
npm run watch
```

## Production

To build the production sass & js files, run:

```
npm run prod
```

## Going Live

- Create the masseur_details table in booking database
- Make it get images from the booking project's images folder
- Add two new salons to booking site and a checkbox to show the salon in calendar or not
- Add a link to each masseur in the booking site, what redirects to the masseurs site, with correct search params
- Make it get masseur profile images from masseur_details table's corresponding column