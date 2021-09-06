/*ý 1*/
SELECT
	c.*,
	COUNT(i.category_id) AS item_count
FROM
	categories AS c
	LEFT JOIN items AS i ON (i.category_id = c.id)
	GROUP BY c.id;
/*ý 2*/
SELECT
	c.*,
	SUM(i.amount) AS sum_amount
FROM
	categories c
	LEFT JOIN items i ON c.id = i.category_id
	GROUP BY c.id
/*ý 3*/
SELECT
	c.*
FROM
	categories c
	JOIN items i ON c.id = i.category_id
	WHERE i.amount > 40
	GROUP BY c.id;
/*ý 4*/
DELETE FROM categories c
WHERE
  NOT EXISTS 
  (SELECT 1 FROM items i Where c.id = i.category_id);