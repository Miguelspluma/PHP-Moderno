UPDATE beer
SET alcohol = alcohol +1.1, name='Lager'
WHERE id = IN(1,2);