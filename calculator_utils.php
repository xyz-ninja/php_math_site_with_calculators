<?php
function generateHistoryContent($db, $autoecho = true) {
	$echo_str = "";
	if (empty($_SESSION['id'])) {
		$echo_str .= "<span>Войдите на сайт, или зарегистрируйтесь что бы сохранить историю Ваших расчётов.</span>";
	} else {
		$cur_session_id = $_SESSION['id'];
		$history_label_q = mysqli_query($db, "SELECT * FROM calc_history WHERE user_id = $cur_session_id ORDER BY id DESC LIMIT 10 ");

		if (mysqli_num_rows($history_label_q) > 0) {
			$cur_i = 0;
			while ($history_label_row = mysqli_fetch_assoc($history_label_q)) {
				$cur_i += 1;
				$echo_str .= "<strong>".$cur_i.") </strong><span>{$history_label_row['text']}</span><br>";
			}
		} else {
			$echo_str .= "<span>История расчётов отсутствует.</span>";
		}
	}

	if ($autoecho) {
		echo $echo_str;
	}

	return $echo_str;
}
?>