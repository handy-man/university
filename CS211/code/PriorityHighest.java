package uk.ac.aber.rcs.cs211.schedulersim.scheduler;

import java.util.*;
import uk.ac.aber.rcs.cs211.schedulersim.*;

/**
 * A priority queue based on the biggest jobtime first, larger jobs are placed at the head of the queue.
 * @author nah14
 * @see uk.ac.aber.rcs.cs211.schedulersim.Simulator
 *
 */
public class PriorityHighest implements Scheduler {

	protected ArrayList<Job> queue;
	private int numberOfJobs;
	private boolean inserted;
	
	public PriorityHighest () {
		this.queue = new ArrayList<Job>();
		this.numberOfJobs=0;
	}
	
	public void addNewJob(Job job) throws SchedulerException {
		if (this.queue.contains(job)) throw new SchedulerException("Job already on Queue");
		/*
		if (this.queue.isEmpty()){
			this.queue.add(this.numberOfJobs, job); //This was a bad idea, we don't shuffle our array around later
		}
		*/
		inserted = false;
		for(int i=0; i<queue.size() && !inserted;i++){
		if (this.queue.get(i).getLength() < job.getLength()){
			this.queue.add(i, job);
		inserted = true;
		}
		
		}
		if(!inserted){
			this.queue.add(job);
		}
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
		// nothing to do in this implementation.
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

	public Job[] getJobList() {
		Job[] jobs = new Job[queue.size()];
		for (int i=0; i<queue.size(); i++) {
			jobs[i]=this.queue.get(i);
		}
		return jobs;
	}

}
