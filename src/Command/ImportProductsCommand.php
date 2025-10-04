<?php

namespace App\Command;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:import-products',
    description: 'Importa productos desde un archivo JSON a la base de datos con valoraciones auto-generadas',
)]
class ImportProductsCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('json-file', InputArgument::OPTIONAL, 'Path to JSON file', 'amazon.json')
            ->setHelp('Este comando importa productos desde un archivo JSON a la base de datos. Si no se especifica un archivo, se usará "amazon.json" por defecto.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $jsonFile = $input->getArgument('json-file');

        if (!file_exists($jsonFile)) {
            $io->error("JSON file '$jsonFile' no encontrado!");
            return Command::FAILURE;
        }

        $jsonContent = file_get_contents($jsonFile);
        $productsData = json_decode($jsonContent, true);

        if (!$productsData) {
            $io->error('Archivo JSON inválido o contenido vacío!');
            return Command::FAILURE;
        }

        $io->title('Importando productos desde JSON');
        
        // Elimina productos existentes
        $this->entityManager->createQuery('DELETE FROM App\Entity\Product')->execute();
        $io->note('Limpiando productos existentes en la base de datos...');
        // lista de valoraciones predefinidas
        $ratings = [
            ['score' => 9.9, 'stars' => 5, 'text' => 'Excepcional'],
            ['score' => 9.3, 'stars' => 4.5, 'text' => 'Excelente'],
            ['score' => 9.0, 'stars' => 4.2, 'text' => 'Genial'],
            ['score' => 8.7, 'stars' => 4.0, 'text' => 'Muy bueno'],
            ['score' => 8.2, 'stars' => 3.8, 'text' => 'Bueno'],
        ];

        $progressBar = $io->createProgressBar(count($productsData));
        $progressBar->start();

        foreach ($productsData as $productData) {
            $rating = $ratings[array_rand($ratings)];
            
            $product = new Product();
            $product->setAsin($productData['asin']);
            $product->setTitle($productData['title']);
            $product->setPrice((string) $productData['price']['value']);
            $product->setCurrency($productData['price']['currency']);
            $product->setPriceSymbol($productData['price']['symbol']);
            $product->setImage($productData['image']);
            $product->setUrl($productData['url']);
            $product->setDescription($productData['description']);
            $product->setCategory($productData['category']);
            $product->setAvailability($productData['availability']);
            $product->setBrand($productData['brand']);
            $product->setFeatures($productData['features']);
            $product->setRatingScore((string) $rating['score']);
            $product->setRatingStars((string) $rating['stars']);
            $product->setRatingText($rating['text']);

            $this->entityManager->persist($product);
            $progressBar->advance();
        }

        $this->entityManager->flush();
        $progressBar->finish();

        $io->newLine(2);
        $io->success(sprintf('Importados %d productos!', count($productsData)));

        return Command::SUCCESS;
    }
}
