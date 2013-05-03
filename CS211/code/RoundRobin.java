package uk.ac.aber.rcs.cs211.schedulersim.scheduler;
import java.util.*;
import uk.ac.aber.rcs.cs211.schedulersim.*;
public class RoundRobin implements Scheduler {




/**
 * My implementation of the "Round-robin" scheduling algorithm.
 * It will give each job 1 cpu tick and then switch it out for the next item in the queue.
 * this allows for lots of context switches, however 0 idle time.
 * @author nah14
 * @see uk.ac.aber.rcs.cs211.schedulersim.Simulator
 *
 */

	protected ArrayList<Job> queue;
	private int numberOfJobs;
	
	public RoundRobin () {
		this.queue = new ArrayList<Job>();
		this.numberOfJobs=0;
		
	}
	
	public void addNewJob(Job job) throws SchedulerException {
		if (this.queue.contains(job)) throw new SchedulerException("Job already on Queue");
		this.queue.add(this.numberOfJobs, job);
		this.numberOfJobs++;
	}

	/**
	 * Returns the next job at the head of the ready queue.
	 * This method should only ever do this - the queue should be kept in the correct order when things are
	 * added and removed.
	 * 
	 * Think about making an abstract class rather then an interface, and make this method final.
	 */
	public Job getNextJob() throws SchedulerException {
		Job lastJobReturned;
		if (this.numberOfJobs<1) throw new SchedulerException("Empty Queue");
		lastJobReturned = (Job)this.queue.get(0);		
		return lastJobReturned;	
	}

	public void returnJob(Job job) throws SchedulerException {
		if (!this.queue.contains(job)) throw new SchedulerException("Job not on Queue");
		//Round robin implementation, simply has 1 cputime and then gets stored in temp, removed from front and inserted into the back.
				Job tempJob;
				tempJob = (Job)this.queue.get(0);
				this.queue.remove(0);
				this.queue.add(queue.size(), tempJob);		
	}

	public void removeJob(Job job) throws SchedulerException {
		if (!this.queue.contains(job)) throw new SchedulerException("Job not on Queue");
		this.queue.remove(job);
		this.numberOfJobs--;
	}

	public void reset() {
		this.queue.clear();
		this.numberOfJobs=0;
	}
	
	
	public void changeJobs(){
		System.out.println("Testing");
	}

	public Job[] getJobList() {
		Job[] jobs = new Job[queue.size()];
		for (int i=0; i<queue.size(); i++) {
			jobs[i]=this.queue.get(i);
		}
		return jobs;
	}

}
