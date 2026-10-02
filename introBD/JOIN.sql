SELECT b.name AS Nombre, alcohol, br.name AS Marca 
FROM beer as b
INNER JOIN brand  as br
ON br.id=b.brand_id
WHERE br.name='Modelo'
ORDER BY n.name;