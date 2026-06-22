<?php


require_once __DIR__ . '/vendor/autoload.php';

// Проверяем, загружен ли файл
$loaded = get_included_files();
echo "Загруженные файлы:\n";
foreach ($loaded as $file) {
	if (strpos($file, 'Cli.php') !== false) {
		echo "✅ Найден: $file\n";
	}
}

// Проверяем, определена ли функция
if (function_exists('BrainGames\Cli\greetUser')) {
	echo "✅ Функция greetUser определена\n";
	\BrainGames\Cli\greetUser();
} else {
	echo "❌ Функция greetUser НЕ определена\n";

	// Пробуем подключить вручную
	require_once __DIR__ . '/src/Cli.php';
	if (function_exists('BrainGames\Cli\greetUser')) {
		echo "✅ После ручного подключения функция определена\n";
		\BrainGames\Cli\greetUser();
	} else {
		echo "❌ Даже после ручного подключения функция не определена\n";
	}
}