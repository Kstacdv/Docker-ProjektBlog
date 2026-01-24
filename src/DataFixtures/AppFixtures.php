<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('admin@example.com');
        $user->setPassword('hash');
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $article = new Article();
        $article->setArticleBody(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae maximus ex. Ut faucibus purus quis pellentesque dapibus. Nulla non ex vel arcu lacinia eleifend. Etiam elit urna, lobortis sed mattis non, suscipit sed odio. Curabitur eget purus luctus, ultrices dui quis, lobortis nisi. Donec non est lorem. Donec sodales quis lacus vitae elementum. Ut odio ipsum, venenatis a finibus faucibus, posuere eu ligula. Vivamus fringilla ligula quis egestas finibus. Curabitur vitae tellus sit amet magna vestibulum dignissim. Donec ligula justo, condimentum sit amet eleifend a, dignissim quis nisi. Nulla orci augue, accumsan sed arcu ut, ultrices tempus felis. Quisque pharetra ipsum eros, et auctor metus feugiat et. Vivamus placerat, turpis in imperdiet faucibus, ligula urna maximus nisi, nec eleifend neque lectus eget est. Donec id quam dui. Sed tristique dolor fringilla enim varius, tristique varius purus porttitor.
            Quisque volutpat dui id laoreet aliquam. Cras in nisl condimentum, sagittis neque id, cursus diam. Suspendisse sagittis pellentesque massa, ac placerat magna dapibus vitae. Vestibulum bibendum posuere lacus ut faucibus. Cras eu justo at urna ullamcorper ultrices. Etiam vestibulum turpis a lacus egestas lobortis. Nunc auctor tortor arcu, quis tempus ligula tincidunt eleifend. Phasellus volutpat eget quam nec lobortis. Aenean et lacus luctus diam ultricies lobortis. Cras imperdiet tellus sit amet consectetur pellentesque. Etiam aliquet augue quis augue tincidunt convallis. Morbi aliquet purus id consectetur cursus. Donec tincidunt rhoncus augue, ac pellentesque magna facilisis eu. Donec facilisis eleifend sem ut blandit. Sed quis libero pulvinar, porttitor eros sollicitudin, viverra urna. Quisque consequat vulputate neque vel blandit.
            Nam vehicula diam sit amet maximus pulvinar. Mauris iaculis tempor vehicula. Duis mollis gravida lorem, vitae convallis metus blandit scelerisque. Quisque nisl magna, vestibulum non faucibus ut, mattis quis tortor. Curabitur eget nibh diam. Nulla interdum lacus varius, consequat libero consectetur, scelerisque libero. Etiam ullamcorper ut ipsum ut lobortis. Cras vel mi nisl. Etiam vitae ante sit amet massa blandit molestie in in quam. Phasellus eleifend ex nec augue semper, in varius risus finibus. Duis accumsan faucibus mi, id tempor ex efficitur sit amet. Ut sollicitudin a ex vel vulputate. Duis quis malesuada nulla. Sed elit magna, fringilla et urna a, interdum vulputate ante. Cras semper laoreet consectetur. Praesent ac ipsum in neque dapibus cursus eu nec odio.
            Nullam quis euismod arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque nec mauris libero. Vivamus id ligula magna. Proin nisl magna, consequat eget ullamcorper non, ultricies eget dolor. Duis placerat tortor eget neque tristique vehicula. Suspendisse feugiat volutpat neque quis viverra. Nulla posuere, nisi nec volutpat rhoncus, lacus erat mattis ipsum, ultrices fringilla urna elit aliquet lacus. Etiam egestas nec odio id fermentum. Proin at orci erat. Integer id fringilla quam. Aenean pellentesque, nulla a iaculis commodo, nulla nibh tincidunt dui, a cursus nulla purus ac nibh. Donec tincidunt nibh a magna molestie, eu volutpat libero pretium. Ut purus urna, maximus quis consectetur non, dignissim vel felis.
            Curabitur volutpat mi id turpis vulputate egestas. Praesent sed finibus leo. Praesent ac rutrum risus, quis laoreet orci. Sed augue augue, efficitur vel metus id, commodo pellentesque ligula. Vestibulum facilisis nibh nec metus auctor pulvinar. Suspendisse sit amet ipsum at enim viverra malesuada ac et magna. Phasellus facilisis nulla luctus odio rhoncus, sed lobortis nibh suscipit. In vehicula euismod efficitur. Sed et justo in risus commodo pellentesque. Pellentesque tempus rhoncus nisi ac ullamcorper. In rutrum nunc et eros commodo maximus. Vestibulum nec arcu a lorem maximus imperdiet eu a urna. Proin eget pellentesque eros, a dignissim metus.'
        );
        $article->setTitle('Tytuł pierwszego');
        $article->setCreatedAt(new \DateTimeImmutable());
        $article->settags('Lore');
        $article->setAuthor($user);
        $article->setDateAdded(new \DateTime());

        $manager->persist($article);

        $article2 = new Article();
        $article2->setArticleBody(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae maximus ex. Ut faucibus purus quis pellentesque dapibus. Nulla non ex vel arcu lacinia eleifend. Etiam elit urna, lobortis sed mattis non, suscipit sed odio. Curabitur eget purus luctus, ultrices dui quis, lobortis nisi. Donec non est lorem. Donec sodales quis lacus vitae elementum. Ut odio ipsum, venenatis a finibus faucibus, posuere eu ligula. Vivamus fringilla ligula quis egestas finibus. Curabitur vitae tellus sit amet magna vestibulum dignissim. Donec ligula justo, condimentum sit amet eleifend a, dignissim quis nisi. Nulla orci augue, accumsan sed arcu ut, ultrices tempus felis. Quisque pharetra ipsum eros, et auctor metus feugiat et. Vivamus placerat, turpis in imperdiet faucibus, ligula urna maximus nisi, nec eleifend neque lectus eget est. Donec id quam dui. Sed tristique dolor fringilla enim varius, tristique varius purus porttitor.
            Quisque volutpat dui id laoreet aliquam. Cras in nisl condimentum, sagittis neque id, cursus diam. Suspendisse sagittis pellentesque massa, ac placerat magna dapibus vitae. Vestibulum bibendum posuere lacus ut faucibus. Cras eu justo at urna ullamcorper ultrices. Etiam vestibulum turpis a lacus egestas lobortis. Nunc auctor tortor arcu, quis tempus ligula tincidunt eleifend. Phasellus volutpat eget quam nec lobortis. Aenean et lacus luctus diam ultricies lobortis. Cras imperdiet tellus sit amet consectetur pellentesque. Etiam aliquet augue quis augue tincidunt convallis. Morbi aliquet purus id consectetur cursus. Donec tincidunt rhoncus augue, ac pellentesque magna facilisis eu. Donec facilisis eleifend sem ut blandit. Sed quis libero pulvinar, porttitor eros sollicitudin, viverra urna. Quisque consequat vulputate neque vel blandit.
            Nam vehicula diam sit amet maximus pulvinar. Mauris iaculis tempor vehicula. Duis mollis gravida lorem, vitae convallis metus blandit scelerisque. Quisque nisl magna, vestibulum non faucibus ut, mattis quis tortor. Curabitur eget nibh diam. Nulla interdum lacus varius, consequat libero consectetur, scelerisque libero. Etiam ullamcorper ut ipsum ut lobortis. Cras vel mi nisl. Etiam vitae ante sit amet massa blandit molestie in in quam. Phasellus eleifend ex nec augue semper, in varius risus finibus. Duis accumsan faucibus mi, id tempor ex efficitur sit amet. Ut sollicitudin a ex vel vulputate. Duis quis malesuada nulla. Sed elit magna, fringilla et urna a, interdum vulputate ante. Cras semper laoreet consectetur. Praesent ac ipsum in neque dapibus cursus eu nec odio.
            Nullam quis euismod arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque nec mauris libero. Vivamus id ligula magna. Proin nisl magna, consequat eget ullamcorper non, ultricies eget dolor. Duis placerat tortor eget neque tristique vehicula. Suspendisse feugiat volutpat neque quis viverra. Nulla posuere, nisi nec volutpat rhoncus, lacus erat mattis ipsum, ultrices fringilla urna elit aliquet lacus. Etiam egestas nec odio id fermentum. Proin at orci erat. Integer id fringilla quam. Aenean pellentesque, nulla a iaculis commodo, nulla nibh tincidunt dui, a cursus nulla purus ac nibh. Donec tincidunt nibh a magna molestie, eu volutpat libero pretium. Ut purus urna, maximus quis consectetur non, dignissim vel felis.
            Curabitur volutpat mi id turpis vulputate egestas. Praesent sed finibus leo. Praesent ac rutrum risus, quis laoreet orci. Sed augue augue, efficitur vel metus id, commodo pellentesque ligula. Vestibulum facilisis nibh nec metus auctor pulvinar. Suspendisse sit amet ipsum at enim viverra malesuada ac et magna. Phasellus facilisis nulla luctus odio rhoncus, sed lobortis nibh suscipit. In vehicula euismod efficitur. Sed et justo in risus commodo pellentesque. Pellentesque tempus rhoncus nisi ac ullamcorper. In rutrum nunc et eros commodo maximus. Vestibulum nec arcu a lorem maximus imperdiet eu a urna. Proin eget pellentesque eros, a dignissim metus.'
        );
        $article2->settitle('Tytuł drugiego');
        $article2->setCreatedAt(new \DateTimeImmutable());
        $article2->setTags('Lore');
        $article2->setAuthor($user);
        $article2->setDateAdded(new \DateTime());

        $manager->persist($article2);

        $manager->flush();
    }
}
