<?php

namespace App\DataFixtures;

use App\Entity\Aiguilles;
use App\Entity\Cables;
use App\Entity\Marques;
use App\Entity\Pelotes;
use App\Entity\TypeAiguilles;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $date = new DateTime();

        $marque1 = new Marques;
        $marque1->setNom("Plidar");
        $manager->persist($marque1);

        $marque2 = new Marques;
        $marque2->setNom("Hobbies");
        $manager->persist($marque2);

        $typeAiguilles1 = new TypeAiguilles;
        $typeAiguilles1->setNom("droite");
        $manager->persist($typeAiguilles1);

        $typeAiguilles2 = new TypeAiguilles;
        $typeAiguilles2->setNom("circulaire avec câble");
        $manager->persist($typeAiguilles2);

        $typeAiguilles3 = new TypeAiguilles;
        $typeAiguilles3->setNom("circulaire sans câble");
        $manager->persist($typeAiguilles3);

        $cable1 = new Cables;
        $cable1->setLongeure(3)
            ->setQuantite(1)
            ->setPrix(3.50);
        $manager->persist($cable1);

        $cable2 = new Cables;
        $cable2->setLongeure(5.5)
            ->setQuantite(3)
            ->setPrix(0.95);
        $manager->persist($cable2);

        $aiguille1 = new Aiguilles();
        $aiguille1->setTaille(3)
            ->setQuantite(3)
            ->setMarque($marque1)
            ->setPrix(1.5)
            ->setTypeAiguilles($typeAiguilles2);
        $manager->persist($aiguille1);

        $aiguille2 = new Aiguilles();
        $aiguille2->setTaille(4.5)
            ->setQuantite(2)
            ->setMarque($marque2)
            ->setPrix(0.50)
            ->setTypeAiguilles($typeAiguilles1);
        $manager->persist($aiguille2);

        $aiguille3 = new Aiguilles();
        $aiguille3->setTaille(6)
            ->setQuantite(2)
            ->setMarque($marque2)
            ->setPrix(1.2)
            ->setTypeAiguilles($typeAiguilles3);
        $manager->persist($aiguille3);

        $pelotte1 = new Pelotes();
        $pelotte1->setNom("Baby Mérinos")
            ->setMatiere("Laine")
            ->setTailleAiguille(3)
            ->setCouleurNom("Bleu Océan")
            ->setCouleurNumero(255)
            ->setMarque($marque1)
            ->setLongeure(5)
            ->setGrammage(2.5)
            ->setEchantillon(10)
            ->setQuantite(18)
            ->setPrix(3.50)
            ->setDateModif($date)
            ->setNomImage("baby_merinos.jpg")
            ->setCommentaire("3 pelottes pour faire un pull");
        $manager->persist($pelotte1);

        $pelotte2 = new Pelotes();
        $pelotte2->setNom("Amigo")
            ->setMatiere("Acrylique")
            ->setTailleAiguille(4.5)
            ->setCouleurNom("Violet")
            ->setCouleurNumero(556)
            ->setMarque($marque2)
            ->setLongeure(6)
            ->setGrammage(3)
            ->setEchantillon(2.88)
            ->setQuantite(3)
            ->setPrix(2.50)
            ->setDateModif($date)
            ->setNomImage("amigo.jpg")
            ->setCommentaire("Laine qui se détend au bout de quatres lavages");
        $manager->persist($pelotte2);

        $manager->flush();
    }
}
