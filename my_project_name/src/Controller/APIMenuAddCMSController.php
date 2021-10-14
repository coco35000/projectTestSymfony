<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use App\Entity\Langues;
use Doctrine\ORM\EntityManagerInterface;

class APIMenuAddCMSController extends AbstractController
{
    public function index(Request $request): Response
    {
        $dataNamePage = $request->request->get('inputNamePage');
        $dataTextCKEditor = $request->request->get('dataEditor');

        $filesystem = new Filesystem();

        $entityManager = $this->getDoctrine()->getManager();

        $langues = new Langues();
        $langues->setLang("FR");
        $langues->setTitre("dataNamePage");
        $langues->setSousTitre("ataNamePage");
        $langues->setSource("dataName");
        $langues->setText($dataTextCKEditor);
        $langues->setResule('$dataTextCKEditor');
        $langues->setMenu($dataNamePage);

        $entityManager->persist($langues);
        $entityManager->flush();

        $nameRouteForView = strtolower($dataNamePage);

        /******************************************************************************************
         * Structure du Controller pour la View qui sera creer et associee.
         * Si ajout de code dans le Controller ne pas oublier de mettre a jour la View par default
         *
         /******************************************************************************************/
        // Les imports, extends, use, nom du Controller, route..
        $structureControllerForView = "<?php \n \n";
        $structureControllerForView .= "namespace App\Controller; \n\n";
        $structureControllerForView .= "use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; \n";
        $structureControllerForView .= "use Symfony\Component\Routing\Annotation\Route; \n";
        $structureControllerForView .= "use App\Entity\Langues; \n";
        $structureControllerForView .= "use Symfony\Component\HttpFoundation\Response; \n\n";
        $structureControllerForView .= "class " . $dataNamePage . "Controller extends AbstractController \n { \n";
        $structureControllerForView .= "\t /** \n \t  * @Route(" . '"/' . $nameRouteForView . '",' . " name=" . '"' . $nameRouteForView . '")' . "\n\t  */ \n";
        $structureControllerForView .= "\t public function index(): Response \n \t { \n ";

        //Code dans la méthode du Controller
        $structureControllerForView .= "\t\t \$repository = \$this->getDoctrine()->getRepository(Langues::class); \n";
        $structureControllerForView .= "\t\t \$categories = \$repository->findAll(); \n";
        $structureControllerForView .= "\t\t return \$this->render('" . $dataNamePage . ".html.twig', ['categories' => \$categories])";

        //Fin du fichier.
        $structureControllerForView .= "\n \t } \n }";

        try {
            // Create Controller for return View and set data in to View.
            $filesystem->appendToFile('../src/Controller/' . $dataNamePage . 'Controller.php', $structureControllerForView);

            // Create Views (HTML)
            $filesystem->copy('./autres/structureHTML5.html.twig', '../templates/' . $dataNamePage . '.html.twig');
        } catch (IOExceptionInterface $exception) {
            echo "Error lors de la création " . $exception->getPath();
        }

        return new Response(
            "Success create page : " . $dataNamePage
        );
    }
}
