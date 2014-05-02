<?php

namespace Mft\AdminBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\Mapping\ClassMetadata;

class DoctrineGenerateRepositoriesCommand extends ContainerAwareCommand {
    protected $repositoryTemplate = 'MftAdminBundle:Templates:repository.html.twig';

    protected function configure() {
        $this
                ->setName('doctrine:generate:repositories')
                ->setDescription('Generates repositories')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $engine = $this->getContainer()->get('templating');
        /* @var $doctrine Registry */
        $doctrine = $this->getContainer()->get('doctrine');
        $manager = $doctrine->getManager();
        $allMetadata = $manager->getMetadataFactory()->getAllMetadata();
        $srcPath =  $this->getContainer()->get('kernel')->getRootdir()."/../src/";
        /* @var $metadata ClassMetadata */
        foreach ($allMetadata as $metadata){
            $entityNameSpace = $metadata->namespace;
            $entityName = str_replace($entityNameSpace.'\\', '', $metadata->getName());
            
            $repositoryNameSpace = str_replace('Entity', 'Repository', $entityNameSpace);
            $entityPath = $srcPath.str_replace("\\", "/", $entityNameSpace).'/'.$entityName.".php";
            $entitySource = file_get_contents($entityPath);
            $repositoryClass = str_replace("Entity\\$entityName", "Repository\\".$entityName."Repository", $entityNameSpace);
            $repositoryDirectory = $srcPath.str_replace("\\", "/", $repositoryNameSpace);
            $repositoryPath = $repositoryDirectory.'/'.$entityName."Repository.php";
            $entitySource = preg_replace("/@ORM\\\\Entity/", "@ORM\Entity(repositoryClass=\"$repositoryClass\")", $entitySource, 1);
            $repositorySource = $engine->render($this->repositoryTemplate, array('namespace' => $repositoryNameSpace, 'name' => $entityName));
            
            if(!is_dir($repositoryDirectory)){
                mkdir($repositoryDirectory);
            }
            $output->write("<info>Updating entity $entityPath...</info>");
            file_put_contents($entityPath, $entitySource);
            $output->writeln("<info>Done</info>");
            $output->write("<info>Generating repository $repositoryPath...</info>");
            file_put_contents($repositoryPath, $repositorySource);
            $output->writeln("<info>Done</info>");
        }
        $output->writeln("<info>Complete</info>");
    }
}
