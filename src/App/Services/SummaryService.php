<?php

declare(strict_types=1);

namespace App\Services;

use GeminiAPI\Client;
use GeminiAPI\Resources\Parts\TextPart;
use Exception;

class SummaryService
{
    private string $apiKey;

    public function __construct()
    {
        // Pobieraj klucz ze zmiennych środowiskowych
        $this->apiKey = 'AIzaSyAjja7DhdzEFjVbHt-M3RFfo3XvgydWlWo';
    }

    public function generateFinancialAdvice(array $incomes, array $expenses, float $balance): string
    {
        if (empty($this->apiKey)) {
            return "Błąd konfiguracji: Brak klucza API.";
        }

        try {
            $client = new Client($this->apiKey);
            $model = $client->generativeModel('gemini-2.5-flash');

            // Formatowanie danych rzeczywistych dla AI
            $incomeString = "PRZYCHODY:\n" . $this->formatTransactions($incomes);
            $expenseString = "WYDATKI:\n" . $this->formatTransactions($expenses);

            $prompt = "Jesteś ekspertem finansowym. Przeanalizuj budżet:
                Przychody: " . number_format(array_sum(array_column($incomes, 'amount')), 2) . " zł
                Wydatki: " . number_format(array_sum(array_column($expenses, 'amount')), 2) . " zł
                Bilans: $balance zł
                
                Szczegóły:
                $incomeString
                $expenseString
                
                Daj krótką (3 zdania), konkretną radę oszczędnościową.";

            $response = $model->generateContent(new TextPart($prompt));
            return $response->text();
        } catch (Exception $e) {
            error_log("Gemini API Error: " . $e->getMessage());
            return "Nie udało się teraz wygenerować porady.";
        }
    }

    private function formatTransactions(array $data): string
    {
        $output = "";
        foreach ($data as $item) {
            // Dodajemy kategorię, żeby AI wiedziało na co idą pieniądze
            $category = $item['category'] ?? 'Inne';
            $output .= "- {$category}: {$item['amount']} zł\n";
        }
        return $output;
    }
}
