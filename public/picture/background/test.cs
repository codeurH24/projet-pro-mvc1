        private NoteBookEntities1 db = new NoteBookEntities1();
        // GET: Appointment
        public ActionResult AddAppointment()
        {
            ViewBag.idBroker = new SelectList(db.brokers, "idBroker", "lastName");
            ViewBag.idCustomer = new SelectList(db.customers, "idCustomer", "lastName");
            string date = TimeSpan.TryParse();// ici j'enregister la date dans l'input de type date et le convertir en string
            string time = " ";// ici j'affecte la variable time.. recupérer depuis un <select></select> dans la view addAppointment
            DateTime dateTime = DateTime.Parse(date + " " + time); // concatenation des variables date et time pour donner un time DateTime/
            return View("");
        }
        // Instanciation du constructeur
        [HttpPost]
        public ActionResult AddAppointment([Bind(Include = "idBroker, idCustomer, idAppointment")] appointment AppointmentToAdd)
        {
            // je dois recupérer le datetime de la classe addAppointment et les ajouter dans une database de type dateTime ici 
            if (ModelState.IsValid)
            {
                db.appointments.Add(AppointmentToAdd); // insertion dans la dataBase
                db.SaveChanges(); // enregistre les changements
                return RedirectToAction("SuccessAddAppointment");
            }
            else
            {
                return View(AppointmentToAdd); // Il y'a des erreurs
            }
        }