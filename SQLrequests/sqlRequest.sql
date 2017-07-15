SELECT DISTINCT user.game FROM users user					
							INNER JOIN payments payment ON user.id = payment.user_id
							WHERE user.level>=10 AND payment.amount>=100