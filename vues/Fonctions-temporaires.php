<?php

function annonce($prenom, $nom, $age, $moyenne_avis, $nb_avis, $date, $heure, $voiture, $prix)
{
                printf("<div class=%s>","annonce");
                    printf("<div class=%s>", "annonce-personne");
                        printf("<div class=%s><img src=%s alt=%s /></div>", "photo-annonce","../include/images/idpicture.jpg", "idpicture");
                        printf("<div>");
                            printf("<h1><b>%s %s</b></h1>",$prenom, $nom);
                            printf("<p>année de naissance : %d</p>", $age);
                        printf("</div>");
                        printf("<p><img src=%s alt=%s /> %d - %d avis</p>","../include/images/etoile-avis.png", "etoile-avis", $moyenne_avis, $nb_avis);
                    printf("</div>");
                    printf("<div class=%s>", "annonce-trajet");
                        printf("<div>");
                            printf("<h1>%s à %s</h1>", $date, $heure);
                            printf("<img src=%s alt=%s /><p>Troyes</p><br>", "../include/images/depart.png", "carte");
                            printf("<img src=%s alt=%s /><p>Paris</p><br>", "../include/images/arrivee.png", "arrivee");
                            printf("<p>Véhicule : <b>%s</b> </p>", $voiture);
                        printf("</div>");
                        
                    printf("</div>");
                    printf("<div class=%s>","annonce-prix");
                    printf("<div>");
                        printf("<h1><b>%d€</b></h1>", $prix);
                        printf("<h3>par place</h3>");
                        printf("<h2><b>Complet</b></h2>");
                    printf("</div>"); 
                printf("</div>");
                printf("</div>");
                
}

function annonce_pers($prenom, $nom, $age, $moyenne_avis, $nb_avis, $date, $heure, $voiture, $prix, $nb_places_libres, $ville_depart, $ville_arrivee)
{
                printf("<div class=%s>","annonce");
                    printf("<div class=%s>", "annonce-personne");
                        printf("<div class=%s><img src=%s alt=%s /></div>", "photo-annonce","../include/images/idpicture.jpg", "idpicture");
                        printf("<div>");
                            printf("<h1><b>%s %s</b></h1>",$prenom, $nom);
                            printf("<p>année de naissance : %d</p>", $age);
                        printf("</div>");
                        printf("<p><img src=%s alt=%s /> %d - %d avis</p>","../include/images/etoile-avis.png", "etoile-avis", $moyenne_avis, $nb_avis);
                    printf("<img src=%s alt=%s />","../include/images/reglage-icon.png", "reglage-icon");
                    printf("</div>");
                    printf("<div class=%s>", "annonce-trajet");
                        printf("<div>");
                            printf("<h1>%s à %sh</h1>", $date, $heure);
                            printf("<img src=%s alt=%s /><p></p>%s<br>", "../include/images/depart.png", "carte", $ville_depart);
                            printf("<img src=%s alt=%s /><p></p>%s<br>", "../include/images/arrivee.png", "arrivee", $ville_arrivee);
                            printf("<p>Véhicule : <b>%s</b> </p>", $voiture);
                        printf("</div>");
                        
                    printf("</div>");
                    printf("<div class=%s>","annonce-prix");
                    printf("<div>");
                        printf("<h1><b>%d€</b></h1>", $prix);
                        printf("<h3>par place</h3>");
                        printf("<br><h3><b>nombre de places disponibles : %d</b><h3>", $nb_places_libres);
                    printf("</div>");
                    printf("<div><img src=%s alt=%s/></div>","../include/images/delete-icon.png","delete-icon"); 
                printf("</div>");
                printf("</div>");
                
}

