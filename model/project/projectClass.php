<?php
    class Project{
        private $strategicLine;
        private $program;
        private $superProject;
        private $projectId;
        private $projectName;
        private $projectObjective;
        private $projectWeighting;
        private $projectInvestment;
        private $projectStartDate;
        private $projectEndDate;
        private $projectEmpResponsible;
        
        public function setProjectSubP($strategicLine, $program, $superProject, $id, $name, $objective, $weighting, $investment, $startDate, $endDate, $responsible){
            $this->strategicLine = $strategicLine;
            $this->program = $program;
            $this->superProject = $superProject;
            $this->projectId = $id;
            $this->projectName = $name;
            $this->projectObjective = $objective;
            $this->projectWeighting = $weighting;
            $this->projectInvestment = $investment;
            $this->projectStartDate = $startDate;
            $this->projectEndDate = $endDate;
            $this->projectEmpResponsible = $responsible;
        }
        
        public function setProject($strategicLine, $program, $id, $name, $objective, $weighting, $investment, $startDate, $endDate, $responsible){
            $this->strategicLine = $strategicLine;
            $this->program = $program;
            $this->projectId = $id;
            $this->projectName = $name;
            $this->projectObjective = $objective;
            $this->projectWeighting = $weighting;
            $this->projectInvestment = $investment;
            $this->projectStartDate = $startDate;
            $this->projectEndDate = $endDate;
            $this->projectEmpResponsible = $responsible;
        }
        
        public function setStrategicLine($strategicLine) {
            $this->strategicLine = $strategicLine;
        }
        
        public function getStrategicLine(){
            return $this->strategicLine;
        }
        
        public function setProgram($program) {
            $this->program = $program;
        }
        
        public function getProgram(){
            return $this->program;
        }
        
        public function setSuperProject($superProj) {
            $this->superProject = $superProj;
        }
        
        public function getSuperProject(){
            return $this->superProject;
        }
        
        public function setProjectID($id) {
            $this->projectId = $id;
        }
        
        public function getProjectID(){
            return $this->projectId;
        }
        
        public function setProjectName($name) {
            $this->projectName = $name;
        }
        
        public function getProjectName(){
            return $this->projectName;
        }
        
        public function setProjectObjective($obj) {
            $this->projectObjective = $obj;
        }
        
        public function getProjectObjective(){
            return $this->projectObjective;
        }
        
        public function setProjectWeighting($weighting) {
            $this->projectWeighting = $weighting;
        }
        
        public function getProjectWeighting(){
            return $this->projectWeighting;
        }
        
        public function setProjectInvestment($investment) {
            $this->projectInvestment = $investment;
        }
        
        public function getProjectInvestment(){
            return $this->projectInvestment;
        }
        
        public function setProjectStartDate($startDate) {
            $this->projectStartDate = $startDate;
        }
        
        public function getProjectstartDate(){
            return $this->projectStartDate;
        }
        
        public function setProjectEndDate($endDate) {
            $this->projectEndDate = $endDate;
        }
        
        public function getProjectEndDate(){
            return $this->projectEndDate;
        }
        
        public function setProjectEmpResponsible($empResponsible) {
            $this->projectEmpResponsible = $empResponsible;
        }
        
        public function getProjectEmpResponsible(){
            return $this->projectEmpResponsible;
        }
    }
?>
