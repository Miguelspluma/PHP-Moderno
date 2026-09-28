SELECT name, alcohol, AVG(alcohol)
FROM beer
GROUP BY name, alcohol;